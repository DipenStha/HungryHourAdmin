@if($paginator->hasPages())
<ul class="pagination" style="color:white">
  <!-- Prevoius Page Link -->
  @if($paginator->onFirstPage())
    <button class="page-item disabled" style="text-align:center;height:35px; width:45px;border-radius:10px"><a class="page-link"><span>&laquo;</span></a></button>
  @else
    <button class="page-item" style="text-align:center;height:35px; width:45px;border-radius:10px"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">&laquo;</a></button>
  @endif

  <!-- Pagination Elements Here -->
  @foreach($elements as $element)
       <!-- Make three dots -->
       @if(is_string($element))
          <button class="page-item disabled"style="text-align:center;height:35px; width:45px;border-radius:10px" ><a  class="page-link"><span>{{$element}}</span></a></button>
       @endif

       <!-- Links Array Here -->
       @if(is_array($element))
           @foreach($element as $page=>$url)

            @if($page == $paginator->currentPage())
                <button class="page-item active" style="text-align:center;height:35px; width:45px;border-radius:10px"><a class="page-link"><span>{{ $page }}</span></a></button>
            @else
                  <button class="page-item" style="text-align:center;height:35px; width:45px;border-radius:10px"><a href="{{ $url }}" class="page-link">{{ $page }}</a></button>
            @endif

           @endforeach
       @endif

  @endforeach

  <!-- Next Page Link -->
  @if($paginator->hasMorePages())
    <button class="page-item" style="text-align:center;height:35px; width:45px;border-radius:10px"><a href="{{ $paginator->nextPageUrl() }}" class="page-link"><span>&raquo;</span></a></button>
  @else
  <button class="page-item disabled" style="text-align:center;height:35px; width:45px;border-radius:10px"><a class="page-link"><span>&raquo;</span></a></button>
  @endif
</ul>

@endif