
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'POS Foundations') | Laravel POS</title>

    <style>
        :root {
            color-scheme: light;
            --ink: #172033;
            --muted: #687386;
            --line: #e5e9f0;
            --brand: #176b55;
            --brand-dark: #10513f;
            --surface: #fff;
            --bg: #f4f7f6;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--ink);
        }

        header {
            background: #fff;
            border-bottom: 1px solid var(--line);
        }

        .nav-wrap {
            max-width: 1100px;
            margin: auto;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
        }

        .brand {
            font-weight: 800;
            letter-spacing: .2px;
            color: var(--brand-dark);
            text-decoration: none;
            font-size: 20px;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        nav a {
            text-decoration: none;
            color: #445064;
            font-weight: 700;
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 14px;
        }

        nav a:hover,
        nav a.active {
            background: #e8f3ef;
            color: var(--brand-dark);
        }

        .nav-user {
            color: var(--muted);
            font-size: 13px;
            padding: 9px 8px;
        }

        .logout-button {
            border: none;
            background: #e8f3ef;
            color: var(--brand-dark);
            font-weight: 700;
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #d6eae2;
        }

        main {
            max-width: 1100px;
            margin: 38px auto;
            padding: 0 24px;
            min-height: 70vh;
        }

        .hero, .panel {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 8px 24px rgba(20,35,50,.04);
        }

        .eyebrow {
            color: var(--brand);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        h1 {
            margin: 9px 0 12px;
            font-size: 32px;
        }

        h2 {
            margin-top: 0;
        }

        p {
            line-height: 1.65;
            color: var(--muted);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 16px;
            margin-top: 22px;
        }

        .card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 20px;
        }

        .card a {
            color: var(--brand-dark);
            font-weight: 700;
            text-decoration: none;
        }

        .table-wrap {
            overflow-x: auto;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            text-align: left;
            padding: 15px 16px;
            border-bottom: 1px solid var(--line);
            font-size: 14px;
        }

        th {
            color: #4c586b;
            background: #f8fafb;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .6px;
        }

        tr:last-child td {
            border-bottom: 0;
        }

        .status {
            display: inline-block;
            border-radius: 30px;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 700;
            background: #e8f5ed;
            color: #237044;
        }

        .status.inactive {
            background: #f2f3f5;
            color: #6d7480;
        }

        footer {
            text-align: center;
            padding: 24px;
            color: #8791a0;
            font-size: 12px;
        }

        @media (max-width: 650px) {
            .nav-wrap {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                font-size: 27px;
            }

            main {
                margin: 24px auto;
            }
        }
    </style>
</head>

<body>
<header>
    <div class="nav-wrap">
        <a class="brand" href="{{ route('home') }}">Laravel POS</a>

        <nav aria-label="Main navigation">
            <a class="{{ request()->routeIs('home') ? 'active' : '' }}"
               href="{{ route('home') }}">Home</a>

            <a class="{{ request()->routeIs('about') ? 'active' : '' }}"
               href="{{ route('about') }}">About</a>

            <a class="{{ request()->routeIs('customers.*') ? 'active' : '' }}"
               href="{{ route('customers.index') }}">Customers</a>

            <a class="{{ request()->routeIs('users.*') ? 'active' : '' }}"
               href="{{ route('users.index') }}">Users</a>

            @auth
                <span class="nav-user">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">
                        Log Out
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}">Log In</a>
                <a href="{{ route('register') }}">Register</a>
            @endguest
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer>
    Laravel POS Foundations · IT0049 Web System Technologies
</footer>
</body>
</html>
