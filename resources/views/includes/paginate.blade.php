<div class="text-muted">
    Mostrando {{ $page->firstItem() }} - {{ $page->lastItem() }} de {{ $page->total() }} registros
</div>
<nav class="d-flex justify-content-center">
    <ul class="pagination pagination-circle mb-0">
        <li class="page-item {{ $page->currentPage() == 1 ? 'disabled' : '' }}">
            <a href="{{ $page->url(1) }}" class="page-link" aria-label="Primeira página">
                <span aria-hidden="true">Primeira página</span>
            </a>
        </li>

        <li class="page-item {{ ($page->currentPage() == 1) ? 'disabled' : '' }}">
            <a href="{{ $page->previousPageUrl() }}" class="page-link" aria-label="Anterior">
                <span aria-hidden="true">Anterior</span>
            </a>
        </li>

        @php
            $start = max(1, $page->currentPage() - 2);
            $end = min($start + 4, $page->lastPage());

            if ($end - $start < 4) {
                $start = max(1, $end - 4);
            }
        @endphp

        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ ($page->currentPage() == $i) ? 'active' : '' }}">
                <a href="{{ $page->url($i) }}" class="page-link">
                    {{ $i }}
                </a>
            </li>
        @endfor

        <li class="page-item {{ ($page->currentPage() == $page->lastPage()) ? 'disabled' : '' }}">
            <a href="{{ $page->nextPageUrl() }}" class="page-link" aria-label="Próximo">
                <span aria-hidden="true">Próxima</span>
            </a>
        </li>

        <li class="page-item {{ $page->currentPage() == $page->lastPage() ? 'disabled' : '' }}">
            <a href="{{ $page->url($page->lastPage()) }}" class="page-link" aria-label="Última página">
                <span aria-hidden="true">Última página</span>
            </a>
        </li>
    </ul>
</nav>
