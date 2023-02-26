<tr>
    <td>
        @if ($level == 1)
        @endif
        @if ($level == 2)
            &nbsp; -
        @endif
        @if ($level == 3)
            &nbsp; &nbsp; - -
        @endif
        {{ $office->name }}
    </td>
    <td>
        {{ $parentOfficeName ?? null }}
    </td>
    <td class="text-right">
        <div class="">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
             
                <li><a class="dropdown-item text-center btn"
                        href="{{ route('offices.edit', $office) }}">Edit</a>
                </li>
                <li>
                    <form action="{{ route('offices.destroy', $office) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="dropdown-item text-center btn form-control" type="submit"
                            onclick="return confirm('Are you sure to delete?')">
                            Delete
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </td>
</tr>
