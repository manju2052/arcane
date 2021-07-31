@extends('layouts.app')

@section('content')
    <div class="containe main_container">
        <div class="row">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">Success</p>
            @endif

            <div class="col-md-12">


                <div class="col-md-8">
                    <ul class="list-group media-list media-list-stream">
                        <li class="text-center media list-group-item p-a"><span style="font-size:x-large"
                                                                                class="fa fa-comments"></span>&nbsp;&nbsp;<span
                                    style="font-size:x-large">Messages</span></li>


                        @if($messagesCount <= 0)
                            <li id="Message00" class="media list-group-item p-a" style="font-size: 18px;">
                            You do not have any messages. To receive messages from your friends: :
                                <br>
                            </li>
                        @else
                            @foreach($messages as $message)
                                <li class="media list-group-item p-a">
                                    <a class="pull-right" href="# ">
                                        <img class="media-object img-circle " src="{{ url('img/profile.png')  }}" style="margin-top: -8px;margin-right: -7px; height: 55px;">
                                    </a>
                                    <div class="media-body" style="    text-align: right;">
                                       
                                        <span style="white-space:pre-wrap;">{{ $message->content  }}  <a href="{{ url('message/delete' , $message->id) }}" >
                                            <!-- Delete Message -->
                                            <img style="padding-bottom:5px;width: 37px;" class="pull-left" src="{{ url('img/trash.png') }}">
                                        </a></span><br><small class="text-muted" data-utcdate="2017-08-26 15:33:32">{{ Carbon\Carbon::parse($message->created_at)->format('d-m-Y')  }}</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif



                    </ul>
                </div>


                <div class="col-md-4">
                    <div class="panel panel-default panel-profile m-b-md">

                        <div class="panel-body text-center">

                            <img data-toggle="modal" data-target="#myModal" class="panel-profile-img"
                                 style="cursor: pointer  height: 260px; width: 260px;"
                                src="{{ $userImage!=='https://graph.facebook.com/2014093932159244/picture?type=large' ? $userImage : asset('/img/profile.png') }}">
                                click to upload profile picture

                            <h5 class="panel-title">
                                <span class="text-inherit"><span data-toggle="modal" data-target="#myModal"
                                                                 style="font-size:medium;color: blue;cursor:pointer;"
                                                                 class="icon icon-cog"> </span><h3>{{ $user->name }}</h3></span>
                            </h5>
                                    <h4>
                                        Number of Messages :
                                        {{ $messagesCount }}
                                    </h4>



                            Share URL to recieve Anonymous messages
                            <span class="text-inherit" style="font-weight:bold"><a href="{{ url('u',$user->name) }}">{{ url('u',$user->name) }}</a></span>
<span id="copy" data-url="{{ url('u',$user->name) }}" >
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
</span>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection


        <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="text-align: right;" class="modal-title">Choose Profile Picture</h4>
                </div>
                <div class="modal-body" style="text-align: right;">
                    <form method="post" action="{{ url('profileImageUpload')  }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choose a picture to upload</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>