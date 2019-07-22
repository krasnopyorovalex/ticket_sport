@if ($paginator->hasPages())
    <div class="match_schedule-row paginator">
        <div>
            <div class="btn btn_more" data-current-page="{{ $paginator->currentPage() }}" data-last-page="{{ $paginator->lastPage() }}">
                Показать еще
            </div>
        </div>
    </div>
@endif
