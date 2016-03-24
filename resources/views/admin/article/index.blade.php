@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <button class="btn btn-large" type="button"><a href="{{URL('/admin/article/create')}}">新增</a></button>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <h3 class="text-center">
                    文章管理
                </h3>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <table class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" />
                        </th>
                        <th>编号</th>
                        <th>标题</th>
                        <th>内容</th>
                        <th>作者</th>
                        <th>显示时间</th>
                        <th>添加时间</th>
                        <th>修改时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>{{$article->article_id}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->content}}</td>
                        <td>{{$article->user_id}}</td>
                        <td>{{date('Y-m-d',$article->display_time)}}</td>
                        <td>{{$article->created_at}}</td>
                        <td>{{$article->updated_at}}</td>
                        <td>
                            <a href="{{ URL('/article/'.$article->article_id.'') }}" class="btn btn-success">查看</a>
                            <a href="{{ URL('/admin/article/'.$article->article_id.'/edit') }}" class="btn btn-primary">编辑</a>
                            <form action="{{ URL('/admin/article/'.$article->article_id) }}" method="POST" style="display: inline;">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <?php echo $articles->fragment('foo')->render(); ?>
            </div>
        </div>
    </div>

@endsection
