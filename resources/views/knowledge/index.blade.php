@extends('layouts.global')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="main-sidebar ">
        <aside id="sidebar-wrapper">
            <ul class="sidebar-menu">
                @if (\Auth::user()->level == "ADMIN")
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
                    <li class="menu-header">Manage Knowledge</li>
                    <li class="dropdown nav-color">
                        <a href="{{ route('knowledge.manage') }}" class="nav-link"><span>Manage Knowledge</span></a>
                    </li>
                @else
                    <li class="menu-header">ASK Knowledge</li>
                    <li class="dropdown nav-color">
                        <a href="{{ route('knowledge.ask') }}" class="nav-link"><span>ASK Knowledge</span></a>
                    </li>
                    </li>  
                @endif
                <li class="menu-header">Request List</li>
                <li class="dropdown nav-color">
                    <a href="{{ route('knowledge.requestList') }}" class="nav-link"><span>Request List</span></a>
                </li>
            </ul>
       </aside>
      </div>
    </div>
    <div class="main-content">
        @yield('knowledgeContent')
    </div>
  </div>
@endsection