 <div class="btn-group float-right">
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)
        
        <button class="btn btn-link btn-disabled text-secondary" style="font-size:13px;text-decoration: none !important}">
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            <span>{!! __('-') !!}</span>
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            <span>{!! __('of') !!}</span>
            <span class="font-medium">{{ $paginator->total() }}</span>

        </button>

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="btn btn-light page-item disabled" aria-disabled="true">
                <span class="fa fa-chevron-left"></span>
            </div>
        @else
            
            <button type="button" class="btn btn-light" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="prev">
                <span class="fa fa-chevron-left"></span>
            </button>
           
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
           
            <button type="button" class="btn btn-light " wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="next">
                <span class="fa fa-chevron-right"></span>
            </button>
            
        @else
            <div class="btn btn-light page-item disabled" aria-disabled="true">
                <span class="fa fa-chevron-right"></span>
            </div>
        @endif
    @endif
</div>
