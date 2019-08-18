@extends('layouts.global')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="main-sidebar ">
        <aside id="sidebar-wrapper">
            <ul class="sidebar-menu">
                    <li class="menu-header"></li>
                    <li class="menu-header">List Knowledge</li>
                        @foreach ($knowledges as $knowledge)
                            @if ($knowledge->child == NULL)
                            <li class="dropdown nav-color">
                                <a href="#" class="nav-link"><span>{{ $knowledge->knowledge_name }}</span></a>
                            @else
                            <li class="dropdown nav-color">
                                <a href="#" class="nav-link has-dropdown"><span>{{ $knowledge->knowledge_name }}</span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($knowledge->child as $child)
                                        <li><a class="nav-link" href="{{ route('knowledge.info', $child->id) }}">{{ $child->child_name }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </li>
                @if (\Auth::user()->level == "ADMIN")
                    <li class="menu-header">Manage Knowledge</li>
                    <li class="dropdown nav-color">
                        <a href="{{ route('knowledge.manage') }}" class="nav-link"><span>Manage Knowledge</span></a>
                    </li>
                    <li class="menu-header">Manage User</li>
                    <li class="dropdown nav-color">
                        <a href="{{ route('users.index') }}" class="nav-link"><span>Manage User</span></a>
                    </li>
                    <li class="menu-header">Request List</li>
                    <li class="dropdown nav-color">
                        <a href="{{ route('knowledge.requestList') }}" class="nav-link"><span>Request List</span></a>
                    </li>
                    <li class="menu-header">Log Activity</li>
                    <li class="dropdown nav-color">
                        <a href="{{ route('knowledge.log') }}" class="nav-link"><span>Log Activity</span></a>
                    </li>
                @else
                    <li class="menu-header">Request Knowledge</li>
                    <li class="dropdown nav-color">
                        <a href="{{ route('knowledge.ask') }}" class="nav-link"><span>Request Knowledge</span></a>
                    </li>
                    <li class="dropdown nav-color">
                        <a href="{{ route('knowledge.requestList') }}" class="nav-link"><span>Request List</span></a>
                    </li>
                    </li>  
                @endif
            </ul>
       </aside>
      </div>
    </div>
    <div class="main-content">
        @yield('knowledgeContent')
    </div>
  </div>
@endsection