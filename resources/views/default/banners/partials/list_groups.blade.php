<nav id="asideLeftNav" class="aside-left-nav mb-2 position-relative">
    <div class="d-grid">
        <button class="btn btn-block btn-lg btn-outline-primary dropdown-toggle d-none" type="button"
            data-bs-toggle="dropdown">
            배너 그룹
        </button>
        <div id="asideNavCategory" class="list-group mb-2">
            <h6 class="dropdown-header d-none">배너 그룹</h6>
            @forelse ($groups as $menu)
                <button type="button" data-list-param="banner_group_id" data-list-title="{{ $menu->name }}"
                    data-list-value="{{ $menu->id }}"
                    class="list-group-item list-group-item-action d-flex justify-content-between {{ Bootstrap5::setActiveNav('banners?banner_group_id=' . $menu->id) }}">
                    {{ $menu->name }}
                    <span class="badge bg-light badge-pill text-primary">{{ $menu->type_str }}</span>
                </button>
            @empty
            @endforelse
        </div>
    </div>
</nav>
