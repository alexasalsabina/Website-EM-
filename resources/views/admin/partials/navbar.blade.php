<header class="topbar">

    <div class="topbar-left" style="display: flex; align-items: center;">

        <button type="button" class="sidebar-toggle" aria-label="Buka menu">
            ☰
        </button>

    </div>

    <div class="topbar-right">

        <div class="admin-profile">

            <div class="avatar">

                {{ strtoupper(substr(Auth::user()->name ?? 'A',0,1)) }}

            </div>

            <div>

                <strong>{{ Auth::user()->name }}</strong>

                <small>{{ Auth::user()->email }}</small>

            </div>

        </div>

    </div>

</header>