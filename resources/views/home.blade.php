@extends('layout.template')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>OceanEscape - Your Ultimate Beach Getaway</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
        <style>
            :root {
                --color-primary: #0a94d8;
                --color-primary-light: #31b0fc;
                --color-bg: #041d33;
                --color-bg-gradient-start: #041d33;
                --color-bg-gradient-end: #043a63;
                --color-accent: #10c3ff;
                --color-card-bg: rgba(255 255 255 / 0.1);
                --color-text-primary: #e0f7ff;
                --color-text-secondary: #a8cfe9;
                --border-radius: 1rem;
                --transition-speed: 0.3s;
                --shadow-glass: 0 8px 32px 0 rgba(16, 195, 255, 0.25);
            }

            *,
            *::before,
            *::after {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                background: linear-gradient(135deg, var(--color-bg-gradient-start), var(--color-bg-gradient-end));
                color: var(--color-text-primary);
                font-family: 'Poppins', sans-serif;
                line-height: 1.6;
                min-height: 100vh;
                scroll-behavior: smooth;
            }

            a {
                color: var(--color-primary-light);
                text-decoration: none;
                transition: color var(--transition-speed);
            }

            a:hover,
            a:focus {
                color: var(--color-accent);
                outline: none;
            }

            header {
                position: sticky;
                top: 0;
                background: rgba(4, 29, 51, 0.75);
                backdrop-filter: saturate(180%) blur(14px);
                z-index: 1000;
                border-bottom: 1px solid rgba(16, 195, 255, 0.2);
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1.5rem;
            }

            nav {
                display: flex;
                align-items: center;
                justify-content: space-between;
                height: 4.5rem;
            }

            .logo {
                font-weight: 700;
                font-size: 1.5rem;
                letter-spacing: 2px;
                color: var(--color-primary-light);
                user-select: none;
            }

            nav ul {
                display: flex;
                gap: 1.75rem;
                list-style: none;
                margin: 0;
                padding: 0;
                align-items: center;
            }

            nav ul li a {
                font-weight: 600;
                font-size: 1rem;
                padding: 0.25rem 0.5rem;
                border-radius: 0.5rem;
                transition: background-color var(--transition-speed), color var(--transition-speed);
            }

            nav ul li a:hover,
            nav ul li a:focus {
                background-color: var(--color-primary-light);
                color: var(--color-bg);
                outline: none;
            }

            /* Hero Section */
            .hero {
                min-height: calc(100vh - 4.5rem);
                display: flex;
                flex-direction: column;
                justify-content: center;
                text-align: center;
                padding: 2rem 1rem;
                background: linear-gradient(180deg, rgba(4, 29, 51, 0.95) 0%, rgba(4, 29, 51, 0.8) 65%, transparent 100%),
                    url('https://cdn.idntimes.com/content-images/community/2019/02/40024908-164543901102140-2971996166790068132-n-251b790bc942d2e5221e7b8b48596a07.jpg') center/cover no-repeat;
                color: var(--color-text-primary);
                position: relative;
                z-index: 1;
                user-select: none;
            }

            .hero h1 {
                font-weight: 800;
                font-size: clamp(2.75rem, 6vw, 4rem);
                margin-bottom: 1rem;
                line-height: 1.1;
                text-shadow: 0 0 8px rgba(16, 195, 255, 0.8);
            }

            .hero p {
                font-weight: 400;
                font-size: clamp(1.125rem, 2vw, 1.5rem);
                max-width: 560px;
                margin: 0 auto 2.5rem auto;
                color: var(--color-text-secondary);
                text-shadow: 0 0 6px rgba(16, 195, 255, 0.6);
            }

            .btn-primary {
                background: linear-gradient(45deg, var(--color-primary), var(--color-primary-light));
                padding: 1rem 2.5rem;
                font-size: 1.125rem;
                font-weight: 700;
                color: var(--color-bg);
                border: none;
                border-radius: var(--border-radius);
                cursor: pointer;
                box-shadow: var(--shadow-glass);
                transition: transform var(--transition-speed), box-shadow var(--transition-speed);
                user-select: none;
                text-transform: uppercase;
                letter-spacing: 1.5px;
            }

            .btn-primary:hover,
            .btn-primary:focus {
                transform: scale(1.05);
                box-shadow: 0 0 30px var(--color-accent);
                outline: none;
            }

            /* Features Section */
            section.features {
                padding: 4rem 1.5rem 6rem 1.5rem;
                max-width: 1200px;
                margin: 0 auto;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
                gap: 2.25rem;
                user-select: none;
            }

            .card {
                background: var(--color-card-bg);
                border-radius: var(--border-radius);
                padding: 2rem;
                box-shadow: var(--shadow-glass);
                backdrop-filter: blur(12px) saturate(180%);
                transition: transform var(--transition-speed), box-shadow var(--transition-speed);
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .card:hover,
            .card:focus-within {
                transform: translateY(-8px);
                box-shadow: 0 0 40px var(--color-accent);
                outline: none;
            }

            .card svg {
                width: 50px;
                height: 50px;
                margin-bottom: 1rem;
                fill: var(--color-primary-light);
                flex-shrink: 0;
            }

            .card h3 {
                font-weight: 700;
                font-size: 1.25rem;
                color: var(--color-primary-light);
                margin-bottom: 1rem;
            }

            .card p {
                color: var(--color-text-secondary);
                font-size: 1rem;
                line-height: 1.4;
                flex-grow: 1;
            }

            /* Footer */
            footer {
                background: rgba(4, 29, 51, 0.75);
                color: var(--color-text-secondary);
                text-align: center;
                padding: 2rem 1rem;
                font-size: 0.875rem;
                user-select: none;
            }

            @media (max-width: 480px) {
                nav ul {
                    gap: 1rem;
                }

                .btn-primary {
                    width: 100%;
                    padding: 1rem 0;
                }

                section.features {
                    grid-template-columns: 1fr;
                    padding: 3rem 1rem 4rem 1rem;
                }
            }
        </style>
    </head>

    <body>

        <main>
            <section class="hero" role="banner" aria-label="Welcome to OceanEscape">
                <h1>SAGARA LAMPUNG</h1>
                <p>Lampung isn’t just a destination—it’s an experience. From the crystal-clear waters of Pahawang to the
                    dramatic cliffs of Pegadungan, every shoreline whispers an invitation to explore, unwind, and fall in
                    love with nature.</p>
                <button class="btn-primary"
                    onclick="document.getElementById('booking').scrollIntoView({ behavior: 'smooth' });"
                    aria-label="Get Started Booking Your Trip">Start Your Journey Now</button>
            </section>


                <section id="features" class="features" aria-label="Featured Beach Destinations">
                    <article class="card" tabindex="0" aria-describedby="desc1">
                        <a href="https://maps.app.goo.gl/y3CiFudok8nuJxrN7" target="_blank"
                            aria-label="Go to Pantai Gigi Hiu">
                            <svg role="img" aria-hidden="true" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32 6c-9.94 0-18 8.06-18 18 0 8.203 5.58 14.955 13.12 16.79L32 58l4.88-17.21C44.42 38.955 50 32.203 50 24c0-9.94-8.06-18-18-18zM32 30a6 6 0 1 1 0-12 6 6 0 0 1 0 12z" />
                            </svg>
                            <h3>Pantai Gigi Hiu</h3>
                            <p id="desc1">Stand before dramatic shark-tooth rock formations crashing against wild ocean
                                waves. A surreal coastal escape for photographers and thrill-seekers.</p>
                        </a>
                    </article>
                    <article class="card" tabindex="0" aria-describedby="desc2">
                        <a href="https://maps.app.goo.gl/j4LcVnn3VBmC6ujF7" target="_blank"
                            aria-label="Go to Pantai Teluk Hantu">
                            <svg role="img" aria-hidden="true" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32 6c-9.94 0-18 8.06-18 18 0 8.203 5.58 14.955 13.12 16.79L32 58l4.88-17.21C44.42 38.955 50 32.203 50 24c0-9.94-8.06-18-18-18zM32 30a6 6 0 1 1 0-12 6 6 0 0 1 0 12z" />
                            </svg>
                            <h3>Pantai Teluk Hantu</h3>
                            <p id="desc2">Uncover the mystery of Lampung’s hidden bay, where misty cliffs and untouched
                                shores invite bold explorers and curious wanderers.</p>
                        </a>
                    </article>
                    <article class="card" tabindex="0" aria-describedby="desc3">
                        <a href="https://maps.app.goo.gl/3XzDcTTTf9zuKcTz9" target="_blank"
                            aria-label="Go to Rio by the Beach">
                            <svg role="img" aria-hidden="true" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32 6c-9.94 0-18 8.06-18 18 0 8.203 5.58 14.955 13.12 16.79L32 58l4.88-17.21C44.42 38.955 50 32.203 50 24c0-9.94-8.06-18-18-18zM32 30a6 6 0 1 1 0-12 6 6 0 0 1 0 12z" />
                            </svg>
                            <h3>Rio by the Beach</h3>
                            <p id="desc3">Chill vibes, golden sands, and ocean breeze—experience Lampung’s beachside
                                lifestyle at its finest, where every sunset feels like a private show.</p>
                        </a>
                    </article>
                </section>


            <section id="booking" class="features" aria-label="Booking Section">
                <article class="card" tabindex="0">
                    <h3>Discover Hidden Paradise in Lampung</h3>
                    <p>Uncover secluded beaches. Dive with vibrant marine life. Witness sunsets like never before.</p>
                    <a href={{ route('map') }} class="btn-primary" aria-label="Go To Maps">Go To Maps</a>
                </article>
            </section>
        </main>

        <footer id="contact">
            <p>© Shafa Salsabila (23/519778/SV/23177).</p>
            <p>Contact us: <a href="mailto:shafasalsabil2005@mail.ugm.ac.id">shafasalsabil2005@mail.ugm.ac.id</a></p>
        </footer>
    </body>

    </html>
@endsection
