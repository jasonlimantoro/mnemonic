<tr>
  <td class="data">
    <img src="{{ $image->url_cache }}" alt="carousel-image" class="img-responsive">
  </td>

  <td class="data">
    @include('backend.layouts.caption')
  </td>

  <td class="data action">
    @can('read-carousel-image')
      <a
        href="{{ route('carousel.images.show', ['carousel' => 1, 'image' => $image->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="See info about this image"
        data-placement="top"
      >
        <i class="fa fa-info-circle"></i>
      </a>

    @endcan

    @can('update-carousel-image')
      <a
        href="{{ route('carousel.images.edit', [ 'carousel' => 1, 'image' => $image->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit this image"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>

    @endcan

    @can('delete-carousel-image')
      <div data-component="DeleteIcon"
           data-prop-url="{{ route('carousel.images.destroy', ['carousel' => 1, 'image' => $image->id]) }}"
      >
      </div>
    @endcan
  </td>
</tr>