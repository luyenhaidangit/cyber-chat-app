<ul class="collapse" id="collapseExample-{{ $code }}">
    @foreach ($children as $child)
        <li style="list-style: none;">
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="{{ $child->id }}" name="permissions[]"
                    value="{{ $child->id }}" @if (in_array($child->id, $rolePermissions)) checked @endif>
                <label class="custom-control-label" for="{{ $child->id }}">{{ $child->name }}</label>
                @if ($child->children->isNotEmpty())
                    <i class="fas fa-angle-down cursor-pointer" data-toggle="collapse"
                        data-target="#collapseExample-{{ $child->id }}" aria-expanded="false"
                        aria-controls="collapseExample-{{ $child->id }}"></i>
                @endif
            </div>
        </li>
        @if ($child->children->isNotEmpty())
            @include('admin.role.edit-item', ['children' => $child->children, 'code' => $child->id])
        @endif
    @endforeach
</ul>
