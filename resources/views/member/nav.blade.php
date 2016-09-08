<div class="side-item-title member-nav row" style="margin: 0;">
    <div class="col-xs-3">
        <a href="{{ url('/member') }}" class="{{ navViewActive('member.index') }}">
            <i class="glyphicon glyphicon-list-alt"></i> 我的帖子
        </a>
    </div>
    <div class="col-xs-3">
        <a href="{{ url('/member/comment') }}"  class="{{ navViewActive('member.comment') }}">
            <i class="glyphicon glyphicon-th-list"></i> 我的回复
        </a>
    </div>
    <div class="col-xs-3">
        <a href="#">
            <i class="glyphicon glyphicon-log-in"></i> 关注我的
        </a>
    </div>
    <div class="col-xs-3">
        <a href="#">
            <i class="glyphicon glyphicon-file"></i> 我关注的
        </a>
    </div>
</div>