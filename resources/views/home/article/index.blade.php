@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="text-center">
                    文章列表
                </h3>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <table class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th>标题</th>
                        <th>内容</th>
                        <th>作者</th>
                        <th>显示时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td><a href="{{ URL('/article/'.$article->article_id) }}">{{$article->title}}</a></td>
                        <td>{{$article->content}}</td>
                        <td><a href="{{URL('/user/'.$article->blongsToUser->id)}}">{{$article->blongsToUser->name}}</a></td>
                        <td>{{date('Y-m-d',$article->display_time)}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <?php echo $articles->fragment('foo')->render(); ?>

            </div>
        </div>
    </div>

@endsection
