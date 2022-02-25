<nav id="asideLeftNav" class="aside-left-nav mb-2 position-relative">
    <div class="d-grid">
        <button class="btn btn-block btn-lg btn-outline-primary dropdown-toggle d-none" type="button"
            data-bs-toggle="dropdown">
            배너 그룹
        </button>
        <div class="list-group mb-2">
            <h6 class="dropdown-header d-none">배너 그룹</h6>
            @forelse ($categories as $menu)
                <a href="{{ route(Bootstrap5::routePrefix() . '.banners.index', ['banner_group_id' => $menu->id]) }}"
                    class="list-group-item list-group-item-action {{ Bootstrap5::setActiveNav('banners?banner_group_id=' . $menu->id) }}">
                    {{ $menu->name }}
                </a>
            @empty
            @endforelse
        </div>
    </div>
</nav>
