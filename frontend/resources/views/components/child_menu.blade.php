@if($categoryParent->categoryChild->count())
    <ul role="menu" class="sub-menu">
        @foreach($categoryParent->categoryChild as $child)
            <li>
                <a href="shop.html">{{$child->name}}</a>
                @if($categoryParent->categoryChild->count())
                    @include('components.child_menu',['categoryParent'=>$child])
                @endif
            </li>
        @endforeach
    </ul>
@endif
