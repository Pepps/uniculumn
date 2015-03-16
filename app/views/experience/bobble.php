
            <td style="display: none;">{{$value->id}}</td>
            <td>{{$value->title}}</td>
            <td>
            @if ($value->type === '0')
            Utbildning
            @elseif ($value->type === '1')
            Jobb
            @elseif ($value->type === '2')
            Merit
            @elseif ($value->type === '3')
            Övrigt
            @endif
          </td>

            <td>{{str_limit($value->description, $limit = 200, $end = '...')}}</td>
            <td>{{ $value->category_id }}</td>
            <td>{{$value->duration}}</td>
            <td>


              {{ Experience::find('city_id')->name }}

              
<!--         </td>
            <td><a class="btn btn-small btn-success" href="{{ URL::to('experience/' . $value->id) }}"><i class="fa fa-search"></i></a></td>
            <td><a class="btn btn-small btn-info" href="{{ URL::to('experience/' . $value->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i></a></td>
            <td><a class="btn btn-warning" href="{{ URL::to('experience/' . $value->id . '/addref') }}"><i class="fa fa-plus"></i></a></td>
           <td><a onclick="deleteExp()" class="btn btn-small btn-danger" href="{{ URL::to('experience/' . $value->id . '/deleteExp') }}"><i class="fa fa-trash"></i>


          </button></td>
        </tr>

    </tbody>
 -->
