# Script para importar la base de datos a Aiven MySQL
# Variables de conexión
$DUMP = "C:\Users\Samanta\Downloads\proyecto.sql"
$CA = "C:\Users\Samanta\Downloads\aiven-ca.pem"
$DB_HOST = "mysql-3780fe9f-parradosamanta21-a2c4.c.aivencloud.com"
$PORT = "15042"
$USER = "avnadmin"
$PASS = "AVNS_4FFz_QkgSyibJG96ra9"
$DB = "defaultdb"

Write-Host "=== Importando base de datos a Aiven MySQL ===" -ForegroundColor Green
Write-Host "Host: $DB_HOST" -ForegroundColor Yellow
Write-Host "Puerto: $PORT" -ForegroundColor Yellow
Write-Host "Base de datos: $DB" -ForegroundColor Yellow
Write-Host "Usuario: $USER" -ForegroundColor Yellow
Write-Host ""

# Verificar que el archivo SQL existe
if (-not (Test-Path $DUMP)) {
    Write-Host "ERROR: No se encontró el archivo SQL en: $DUMP" -ForegroundColor Red
    exit 1
}

# Verificar que el certificado CA existe
if (-not (Test-Path $CA)) {
    Write-Host "ERROR: No se encontró el certificado CA en: $CA" -ForegroundColor Red
    exit 1
}

Write-Host "Archivos encontrados correctamente:" -ForegroundColor Green
Write-Host "- SQL Dump: $DUMP" -ForegroundColor White
Write-Host "- Certificado CA: $CA" -ForegroundColor White
Write-Host ""

Write-Host "Ejecutando importación..." -ForegroundColor Green
Write-Host "Comando: mysql --host=$DB_HOST --port=$PORT --user=$USER --password=*** --database=$DB --ssl-ca=$CA --ssl-mode=REQUIRED" -ForegroundColor Gray
Write-Host ""

try {
    # Ejecutar el comando de importación usando Get-Content y pipe
    $sqlContent = Get-Content $DUMP -Raw
    $sqlContent | mysql --host=$DB_HOST --port=$PORT --user=$USER --password=$PASS --database=$DB --ssl-ca=$CA --ssl-mode=REQUIRED
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host "✅ Importación completada exitosamente!" -ForegroundColor Green
        Write-Host ""
        Write-Host "Verificando tablas importadas..." -ForegroundColor Yellow
        
        # Comando para verificar las tablas
        $verifyCommand = "mysql --host=$DB_HOST --port=$PORT --user=$USER --password=$PASS --database=$DB --ssl-ca=$CA --ssl-mode=REQUIRED -e `"SHOW TABLES;`""
        
        Write-Host "Tablas en la base de datos:" -ForegroundColor Cyan
        Invoke-Expression $verifyCommand
        
        Write-Host ""
        Write-Host "Verificando datos de usuarios..." -ForegroundColor Yellow
        $userCommand = "mysql --host=$DB_HOST --port=$PORT --user=$USER --password=$PASS --database=$DB --ssl-ca=$CA --ssl-mode=REQUIRED -e `"SELECT id_usuario, nombre_usuario, apellido, correo FROM usuarios;`""
        Invoke-Expression $userCommand
        
        Write-Host ""
        Write-Host "Verificando datos de patinetas..." -ForegroundColor Yellow
        $scooterCommand = "mysql --host=$DB_HOST --port=$PORT --user=$USER --password=$PASS --database=$DB --ssl-ca=$CA --ssl-mode=REQUIRED -e `"SELECT id_patineta, numero_serial, marca, color FROM patinetas;`""
        Invoke-Expression $scooterCommand
        
        Write-Host ""
        Write-Host "Verificando datos de citas..." -ForegroundColor Yellow
        $appointmentCommand = "mysql --host=$DB_HOST --port=$PORT --user=$USER --password=$PASS --database=$DB --ssl-ca=$CA --ssl-mode=REQUIRED -e `"SELECT id_cita, id_usuario, id_patineta, fecha, hora, motivo FROM citas;`""
        Invoke-Expression $appointmentCommand
        
        Write-Host ""
        Write-Host "🎉 ¡Base de datos importada y verificada exitosamente!" -ForegroundColor Green
        Write-Host "La aplicación Laravel ahora puede conectarse a la base de datos en Aiven." -ForegroundColor White
        
    } else {
        Write-Host "❌ Error durante la importación. Código de salida: $LASTEXITCODE" -ForegroundColor Red
        exit 1
    }
} catch {
    Write-Host "❌ Error ejecutando el comando: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host ""
Write-Host "=== Configuración para Laravel ===" -ForegroundColor Magenta
Write-Host "Actualiza tu archivo .env con las siguientes variables:" -ForegroundColor White
Write-Host "DB_CONNECTION=mysql" -ForegroundColor Cyan
Write-Host "DB_HOST=$DB_HOST" -ForegroundColor Cyan
Write-Host "DB_PORT=$PORT" -ForegroundColor Cyan
Write-Host "DB_DATABASE=$DB" -ForegroundColor Cyan
Write-Host "DB_USERNAME=$USER" -ForegroundColor Cyan
Write-Host "DB_PASSWORD=$PASS" -ForegroundColor Cyan
Write-Host "DB_SSL_CA=$CA" -ForegroundColor Cyan
Write-Host "DB_SSL_MODE=REQUIRED" -ForegroundColor Cyan
