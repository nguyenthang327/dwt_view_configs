<table class="table">
    <thead  class="thead-dark">
      <tr >
        <th scope="col">#</th>
        <th scope="col">Phòng ban</th>
        <th scope="col">Thuộc tính</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>
            @foreach($viewConfig->viewConfigAttributes as $item)
            <span class="col-2">
                {{$item->name}} - {{$item->code}}
            </div>
            @endforeach
        </td>
      </tr>
    </tbody>
  </table>