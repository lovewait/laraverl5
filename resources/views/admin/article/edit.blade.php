@extends('app')

@section('content')
	<div class="container">
		<div class="row">
                <h3 class="panel-heading text-center">编辑 Article</h3>

                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" action="{{URL('/admin/article/'.$article->article_id)}}" method="POST">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="title" required="required"
                                       placeholder="请输入标题" value="{{$article->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label">内容</label>
                            <div class="col-sm-10">
                                <textarea name="content" class="form-control" rows="3" id="content" required="required" placeholder="请输入内容">{{$article->content}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="display_time" class="col-sm-2 control-label">显示时间</label>
                            <div class="col-sm-10">
                                <input name="display_time" type="text" class="form-control" id="display_time"
                                       placeholder="请输入xxxx-xx-xx格式时间" value="{{date('Y-m-d',$article->display_time)}}">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <div class="col-sm-2">&nbsp;</div>
                            <button type="submit" class="btn" contenteditable="false">提交</button>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>

@endsection
