@extends('layouts.app')
@section('title','首页')

@section('content')
    <div class="index-banner">
        <div class="slogon z-grid mt-5">
            <p class="slogon-tit text-center">找专业的人，做专业的事</p>
            <div class="notice-list">
                <span class="line mr-3"></span>
                <span class="notice-content">为 <span class="text-danger">6000</span> 企业主提供服务</span>
                <span class="line ml-3"></span>

            </div>
        </div>
        <div class="card-list mx-auto">
            <nav id="nav-card">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true"><span class="span1">案例展示 <small class="text-muted">了解我们公司实力</small></span></a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false"><span
                                class="span1">团队介绍 <small class="text-muted">为您推荐人才</small></span></a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                       aria-controls="nav-contact" aria-selected="false"><span class="span1">发布需求 <small
                                    class="text-muted">让人才主动找您</small></span></a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid, delectus deserunt ducimus eos
                    error, eum in ipsum libero magnam molestias odit pariatur perferendis possimus rerum sapiente sit
                    voluptate voluptatem.
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">人才类别一</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">人才类别二</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">人才类别四</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-4 pr-0">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list"
                                   data-toggle="list" href="#list-home" role="tab" aria-controls="home">项目一</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list"
                                   data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">项目二</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list"
                                   data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">项目三</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list"
                                   data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">项目四</a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                     aria-labelledby="list-home-list">
                                    <form action="">
                                        <div class="form-group">
                                            <label class="col-form-label" for="content">补充详细信息</label>
                                            <textarea name="content" id="content" rows="3" class="form-control"
                                                      placeholder="请填写您的详细需求"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">提交</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="list-profile" role="tabpanel"
                                     aria-labelledby="list-profile-list">
                                    <form action="">
                                        <div class="form-group">
                                            <label class="col-form-label" for="content">补充详细信息</label>
                                            <textarea name="content" id="content" rows="3" class="form-control"
                                                      placeholder="请填写您的详细需求"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">提交</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                     aria-labelledby="list-messages-list">
                                    <form action="">
                                        <div class="form-group">
                                            <label class="col-form-label" for="content">补充详细信息</label>
                                            <textarea name="content" id="content" rows="3" class="form-control"
                                                      placeholder="请填写您的详细需求"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">提交</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                     aria-labelledby="list-settings-list">
                                    <form action="">
                                        <div class="form-group">
                                            <label class="col-form-label" for="content">补充详细信息</label>
                                            <textarea name="content" id="content" rows="3" class="form-control"
                                                      placeholder="请填写您的详细需求"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">提交</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection