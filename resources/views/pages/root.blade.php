@extends('layouts.app')
@section('title','首页')

@section('content')
    <div class="index-banner">
        <div class="slogon z-grid mt-5">
            <p class="slogon-tit text-center">找专业的人，做专业的事</p>
            <div class="notice-list ">
                <div class="notice-content">为 6000 企业主提供服务</div>
            </div>
        </div>
        <div class="card-list mx-auto">
            <nav id="nav-card">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><span class="span1">案例展示</span></a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><span class="span1">团队介绍</span><span>234234</span></a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><span class="span1">发布需求</span></a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid, delectus deserunt ducimus eos error, eum in ipsum libero magnam molestias odit pariatur perferendis possimus rerum sapiente sit voluptate voluptatem.</div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>

        </div>

    </div>
@endsection