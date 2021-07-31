<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>
        <x-menu-item
            title="Profile"
            icon="bi bi-person-fill"
            url="{{ route('profile') }}"
            isActive="{{ isActive('profile') }}"
            :isSingle="true"/>
        <x-menu-item
            title="Information"
            icon="bi bi-grid-fill"
            url="{{ route('information') }}"
            isActive="{{ isActive('information') }}"
            :isSingle="true"/>
        <x-menu-item
            title="Services"
            icon="bi bi-stack"
            url="{{ route('services') }}"
            isActive="{{ isActive('services') }}"
            :isSingle="true"/>

        <x-menu-item
            title="Clients"
            icon="bi bi-person-fill"
            url="{{ route('clients') }}"
            isActive="{{ isActive('clients') }}"
            :isSingle="true"/>
        <x-menu-item
            title="Brands"
            icon="bi bi-image-fill"
            url="{{ route('brands') }}"
            isActive="{{ isActive('brands') }}"
            :isSingle="true"/>
        <x-menu-item
            title="Categories"
            icon="bi bi-stack"
            url="{{ route('categories') }}"
            isActive="{{ isActive('categories') }}"
            :isSingle="true"/>
        <x-menu-item
            title="Campaigns"
            icon="bi bi-file-earmark-spreadsheet-fill"
            url="{{ route('campaigns') }}"
            isActive="{{ isActive('campaigns') }}"
            :isSingle="true"/>
        <x-menu-item
            title="Social Media"
            icon="bi bi-collection-fill"
            url="{{ route('socialMedia') }}"
            isActive="{{ isActive('socialMedia') }}"
            :isSingle="true"/>
    </ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>



