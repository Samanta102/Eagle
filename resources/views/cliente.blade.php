<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroSkate Care | Mantenimiento Profesional de Patinetas Eléctricas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00a8ff;
            --secondary: #0097e6;
            --dark: #1e272e;
            --light: #f5f6fa;
            --accent: #ffa502;
            --success: #4cd137;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            background-color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background-color: rgba(30, 39, 46, 0.9);
            color: white;
            position: fixed;
            width: 100%;
            z-index: 1000;
            padding: 15px 0;
            transition: all 0.3s ease;
        }

        header.scrolled {
            padding: 10px 0;
            background-color: rgba(30, 39, 46, 0.98);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .logo i {
            color: var(--primary);
            margin-right: 10px;
            font-size: 2rem;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
        }

        nav ul li a:hover {
            color: var(--primary);
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary);
            bottom: -5px;
            left: 0;
            transition: width 0.3s;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/images/fondo-hero.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            padding-top: 80px;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            border: 2px solid var(--primary);
        }

        .btn:hover {
            background-color: transparent;
            color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid white;
            margin-left: 15px;
        }

        .btn-outline:hover {
            background-color: white;
            color: var(--dark);
        }

        /* Services Section */
        .section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--dark);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 70px;
            height: 3px;
            background-color: var(--primary);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .service-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .service-img {
            height: 200px;
            overflow: hidden;
        }

        .service-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .service-card:hover .service-img img {
            transform: scale(1.1);
        }

        .service-content {
            padding: 25px;
        }

        .service-content h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .service-content p {
            color: #666;
            margin-bottom: 20px;
        }

        .service-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        /* About Section */
        .about {
            background-color: var(--dark);
            color: white;
        }

        .about .section-title h2 {
            color: white;
        }

        .about .section-title h2::after {
            background-color: var(--accent);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-text h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .about-text p {
            margin-bottom: 20px;
        }

        .values-list {
            margin-top: 30px;
        }

        .value-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .value-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(0, 168, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .about-img {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .about-img img {
            width: 100%;
            height: auto;
            display: block;
        }
        .about-video {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .about-video video {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
            border-radius: 10px;
        }


        /* Testimonials */
        .testimonials {
            background-color: #f9f9f9;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .testimonial-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 5rem;
            color: rgba(0, 168, 255, 0.1);
            font-family: serif;
            line-height: 1;
        }

        .testimonial-content {
            position: relative;
            z-index: 1;
            margin-bottom: 20px;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }

        .author-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h4 {
            margin-bottom: 5px;
        }

        .author-info p {
            color: #777;
            font-size: 0.9rem;
        }

        .rating {
            color: var(--accent);
            margin-top: 5px;
        }

        /* Contact Section */
        .contact {
            background-color: var(--dark);
            color: white;
        }

        .contact .section-title h2 {
            color: white;
        }

        .contact .section-title h2::after {
            background-color: var(--accent);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .contact-info h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .contact-method {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(0, 168, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .contact-form textarea {
            height: 150px;
            resize: none;
        }

        .contact-form button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }

        .contact-form button:hover {
            background-color: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Footer */
        footer {
            background-color: #1a2229;
            color: #aaa;
            padding: 60px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-col h3 {
            color: white;
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-col ul li a:hover {
            color: var(--primary);
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            z-index: 999;
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: var(--secondary);
            transform: translateY(-5px);
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .about-content,
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .about-img {
                order: -1;
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .btn {
                padding: 10px 20px;
            }

            .mobile-menu-btn {
                display: block;
            }

            nav {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 80%;
                height: calc(100vh - 80px);
                background-color: var(--dark);
                flex-direction: column;
                align-items: center;
                padding: 40px 0;
                transition: all 0.5s ease;
            }

            nav.active {
                left: 0;
            }

            nav ul {
                flex-direction: column;
                width: 100%;
            }

            nav ul li {
                margin: 15px 0;
                text-align: center;
            }

            .section {
                padding: 70px 0;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2rem;
            }

            .btn-group {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .btn-outline {
                margin-left: 0;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 1s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.2s;
        }

        .delay-2 {
            animation-delay: 0.4s;
        }

        .delay-3 {
            animation-delay: 0.6s;
        }

        .delay-4 {
            animation-delay: 0.8s;
        }
    </style>
</head>
<body>
    <!-- Header -->
        <header id="header">
        <div class="container header-container" style="display: flex; justify-content: space-between; align-items: center;">
            
            {{-- Logo a la izquierda --}}
            <a href="#" class="logo" style="display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-bolt"></i>
                <span>ElectricHouse</span>
            </a>

            {{-- Menú para móviles --}}
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>

            {{-- Navegación principal --}}
            <nav id="nav">
                <ul style="display: flex; gap: 20px; list-style: none; padding: 0; margin: 0;">
                    <li><a href="#home">Inicio</a></li>
                    <li><a href="#services">Servicios</a></li>
                    <li><a href="#about">Nosotros</a></li>
                    <li><a href="#testimonials">Testimonios</a></li>
                    <li><a href="#contact">Contacto</a></li>
                </ul>
            </nav>

            {{-- Usuario e icono y cerrar sesión a la derecha --}}
            <div class="user-session" style="display: flex; align-items: center; gap: 15px; margin-left: 60px;">
                <span style="font-weight: bold; color: white;">
                    {{ session('usuario')->nombre_usuario }}
                </span>
                <i class="fas fa-user-circle" style="font-size: 20px; color: white;"></i>

                <form action="{{ route('logout') }}" method="GET" onsubmit="return confirm('¿Cerrar sesión?')">
                    <button type="submit" style="background: none; border: none; color: white; font-size: 14px; cursor: pointer;">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content fade-in">
                <h1>Mantenimiento Profesional de Patinetas Eléctricas</h1>
                <p>Seguridad y Rendimiento Óptimo en Cada Viaje. Prepárate para vivir la máxima emoción en cada trayecto. Con un equipo de expertos apasionados y tecnología avanzada, te garantizamos un rendimiento impecable y una seguridad total.</p>
                <div class="btn-group">
                    <a href="#services" class="btn">Nuestros Servicios</a>
                    <a href="#contact" class="btn btn-outline">Contacto</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section" id="services">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Nuestros Servicios</h2>
                <p>Ofrecemos una gama completa de servicios de mantenimiento, reparación y personalización</p>
            </div>
            <div class="services-grid">
                <div class="service-card fade-in delay-1">
                    <div class="service-img">
                        <img src="images/service1.jpg" alt="Mantenimiento Preventivo">
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Mantenimiento Preventivo</h3>
                        <p>Revisión general de componentes, lubricación y revisión del sistema eléctrico y batería.</p>
                        <a href="{{ route('vista') }}" class="btn">Solicitar</a>
                    </div>
                </div>
                
                <div class="service-card fade-in delay-2">
                    <div class="service-img">
                        <img src="images/service2.jpg" alt="Mantenimiento Correctivo">
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h3>Mantenimiento Correctivo</h3>
                        <p>Reparación de batería, cambio de llantas, reparación de frenos y componentes eléctricos.</p>
                        <a href="{{ route('vista') }}" class="btn">Solicitar</a>
                    </div>
                </div>
                
                <div class="service-card fade-in delay-3">
                    <div class="service-img">
                        <img src="images/service3.png" alt="Personalización">
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <h3>Personalización</h3>
                        <p>Actualización de motores, baterías, personalización estética y adición de accesorios.</p>
                        <a href="{{ route('vista') }}" class="btn">Solicitar</a>
                    </div>
                </div>
                
                <div class="service-card fade-in delay-4">
                    <div class="service-img">
                        <img src="images/service4.jpg" alt="Diagnóstico avanzado">
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Diagnóstico Avanzado</h3>
                        <p>Diagnóstico detallado de fallas eléctricas y mecánicas con herramientas especializadas.</p>
                        <a href="{{ route('vista') }}" class="btn">Solicitar</a>
                    </div>
                </div>
                
                <div class="service-card fade-in delay-1">
                    <div class="service-img">
                        <img src="images/service5.jpg" alt="Venta de repuestos">
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3>Venta de Repuestos</h3>
                        <p>Repuestos originales y venta de accesorios como luces, frenos y protectores.</p>
                        <a href="{{ route('vista') }}" class="btn">Solicitar</a>
                    </div>
                </div>
                
                <div class="service-card fade-in delay-2">
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>Servicio a Domicilio</h3>
                        <p>Nuestro equipo de expertos está listo para ayudarte a encontrar el repuesto adecuado y brindarte asesoramiento especializado.</p>
                        <a href="{{ route('vista') }}" class="btn">Solicitar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section about" id="about">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Sobre Nosotros</h2>
            </div>
            <div class="about-content">
                <div class="about-text fade-in delay-1">
                    <h3>Expertos en Movilidad Sostenible</h3>
                    <p>Somos una empresa apasionada por la movilidad sostenible y la innovación tecnológica. Nos especializamos en el mantenimiento, personalización y optimización de patinetas eléctricas para garantizar un rendimiento óptimo y seguro.</p>
                    <p>Nuestro equipo está compuesto por expertos en electrónica, mecánica y diseño, siempre enfocados en ofrecer soluciones de alta calidad para mejorar la experiencia de nuestros clientes.</p>
                    
                    <div class="values-list">
                        <h4>Nuestros Valores</h4>
                        <div class="value-item">
                            <div class="value-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div> <br>
                                <h5>Compromiso con la calidad</h5>
                                <p>Garantizamos el más alto estándar en todos nuestros servicios.</p>
                            </div>
                        </div>
                        <div class="value-item">
                            <div class="value-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div>
                                <h5>Innovación constante</h5>
                                <p>Siempre buscamos las mejores soluciones tecnológicas.</p>
                            </div>
                        </div>
                        <div class="value-item">
                            <div class="value-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h5>Atención al cliente excepcional</h5>
                                <p>Tu satisfacción es nuestra prioridad.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-video fade-in delay-2">
                    <video src="/videos/videoapp.mp4" autoplay muted loop playsinline></video>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section testimonials" id="testimonials">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Lo que dicen nuestros clientes</h2>
                <p>Experiencias reales de usuarios satisfechos con nuestros servicios</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card fade-in delay-1">
                    <div class="testimonial-content">
                        <p>Excelente servicio! Mi patineta quedó como nueva después del mantenimiento. El equipo es muy profesional y conocedor. Definitivamente los recomiendo.</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Carlos M.">
                        </div>
                        <div class="author-info">
                            <h4>Carlos M.</h4>
                            <p>Usuario frecuente</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card fade-in delay-2">
                    <div class="testimonial-content">
                        <p>Rápido, eficiente y con excelentes resultados. Solucionaron un problema eléctrico que otros no pudieron diagnosticar. Muy contenta con el servicio.</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Ana L.">
                        </div>
                        <div class="author-info">
                            <h4>Ana L.</h4>
                            <p>Primera vez</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card fade-in delay-3">
                    <div class="testimonial-content">
                        <p>La personalización que hicieron de mi patineta superó todas mis expectativas. No solo mejoró el rendimiento sino que ahora tiene un look increíble.</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Javier R.">
                        </div>
                        <div class="author-info">
                            <h4>Javier R.</h4>
                            <p>Cliente frecuente</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section contact" id="contact">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Contacto</h2>
                <p>Estamos listos para atenderte y resolver todas tus dudas</p>
            </div>
            <div class="contact-grid">
                <div class="contact-info fade-in delay-1">
                    <h3>Información de Contacto</h3>
                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4>Dirección</h4>
                            <p>Cr 15 #80-60, Chapinero, Bogotá</p>
                        </div>
                    </div>
                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h4>Teléfono</h4>
                            <p>+57 3203346863</p>
                        </div>
                    </div>
                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <p>info@electrichouse.com</p>
                        </div>
                    </div>
                    <div class="contact-method">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4>Horario</h4>
                            <p>Lunes a Viernes: 9am - 6pm<br>Sábados: 9am - 5pm</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form fade-in delay-2">
                    <form id="contactForm">
                        <input type="text" name="nombre" placeholder="Nombre completo" required>
                        <input type="email" name="correo" placeholder="Correo electrónico" required>
                        <input type="tel" name="telefono" placeholder="Teléfono (opcional)">
                        <select name="servicio" required>
                            <option value="" disabled selected>Selecciona un servicio</option>
                            <option>Mantenimiento Preventivo</option>
                            <option>Mantenimiento Correctivo</option>
                            <option>Personalización</option>
                            <option>Diagnóstico Avanzado</option>
                            <option>Venta de Repuestos</option>
                            <option>Servicio a Domicilio</option>
                        </select>
                        <textarea name="mensaje" placeholder="Tu mensaje" required></textarea>
                        <button type="submit">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Script para enviar a WhatsApp -->
    <script>
        document.getElementById("contactForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const nombre = document.querySelector('[name="nombre"]').value;
            const correo = document.querySelector('[name="correo"]').value;
            const telefono = document.querySelector('[name="telefono"]').value;
            const servicio = document.querySelector('[name="servicio"]').value;
            const mensaje = document.querySelector('[name="mensaje"]').value;

            const texto = `Hola, me llamo *${nombre}*.%0ACorreo: ${correo}%0ATeléfono: ${telefono}%0AServicio: ${servicio}%0AMensaje: ${mensaje}`;
            const numero = "573208841934"; // Número de la empresa

            // Redirigir a WhatsApp
            window.open(`https://wa.me/${numero}?text=${texto}`, "_blank");
        });
    </script>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>ElectricHouse</h3>
                    <p>Expertos en mantenimiento y reparación de patinetas eléctricas. Garantizamos seguridad y máximo rendimiento en cada viaje.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h3>Servicios</h3>
                    <ul>
                        <li><a href="#">Mantenimiento Preventivo</a></li>
                        <li><a href="#">Mantenimiento Correctivo</a></li>
                        <li><a href="#">Personalización</a></li>
                        <li><a href="#">Diagnóstico Avanzado</a></li>
                        <li><a href="#">Venta de Repuestos</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Enlaces Rápidos</h3>
                    <ul>
                        <li><a href="#home">Inicio</a></li>
                        <li><a href="#services">Servicios</a></li>
                        <li><a href="#about">Nosotros</a></li>
                        <li><a href="#testimonials">Testimonios</a></li>
                        <li><a href="#contact">Contacto</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Contacto</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Cr 15 #80-60</li>
                        <li><i class="fas fa-phone-alt"></i> +57 3203346863</li>
                        <li><i class="fas fa-envelope"></i> info@electrichouse.com</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 ElectricHouse. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const nav = document.getElementById('nav');

        mobileMenuBtn.addEventListener('click', () => {
            nav.classList.toggle('active');
            mobileMenuBtn.innerHTML = nav.classList.contains('active') ? 
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });

        // Close mobile menu when clicking on a link
        const navLinks = document.querySelectorAll('nav ul li a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
            });
        });

        // Header scroll effect
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Back to top button
        const backToTopBtn = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('active');
            } else {
                backToTopBtn.classList.remove('active');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Form submission
        const contactForm = document.getElementById('contactForm');
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Gracias por tu mensaje. Nos pondremos en contacto contigo pronto.');
            contactForm.reset();
        });

        // Animation on scroll
        const fadeElements = document.querySelectorAll('.fade-in');
        
        const fadeInOnScroll = () => {
            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementTop < windowHeight - 100) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        };

        // Initialize animations
        window.addEventListener('load', fadeInOnScroll);
        window.addEventListener('scroll', fadeInOnScroll);
    </script>
</body>
</html>