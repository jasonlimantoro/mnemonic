  <tr>
    <td class="data title">
      <a href="{{ subdomainRoute('albums.show', ['album' => $album->id ]) }}">
        {{ $album->name }}
      </a>
    </td>
    <td class="data body">{!! $album->description !!}</td>

    <td class="data action">
      <a
        href="{{ subdomainRoute('albums.show', ['album' => $album->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Show info"
        data-placement="top"
      >
        <i class="fa fa-info-circle"></i>
      </a>
      <a
        href="{{ subdomainRoute('albums.edit', ['album' => $album->id ]) }}"
        role="button"
        data-toggle="tooltip"
        title="Edit"
        data-placement="top"
      >
        <i class="fa fa-pencil-square-o"></i>
      </a>
      <div data-component="DeleteIcon"
           data-prop-url="{{ subdomainRoute('albums.destroy', ['album' => $album->id ]) }}"
      >
      </div>
    </td>
  </tr>
<tr>
