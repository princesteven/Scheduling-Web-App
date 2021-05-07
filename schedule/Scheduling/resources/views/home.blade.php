@extends('layouts.template')
@section('title','Home')
@section('step','Dashboard')
@section('description','Normal')
@section('active_dashboard', 'active')

@section('content')
    <div class="alert alert-info alert-dismissable">
        <b>REGISTRATION STATUS ACADEMIC YEAR : 2018/2019</b><br/>
        <b>SEMESTER I :  <span class="required">REGISTERED</span> &nbsp; &nbsp; BACHELOR OF ENGINEERING IN COMPUTER - THIRD YEAR</b><br/>
        <b>SEMESTER II :  <span class="required">REGISTERED</span>  &nbsp; &nbsp; </b>
    </div>

    <div class="row">
        <div class="col-md-7 no-padding">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Dashboard</h5>
                <div class="ibox-tools">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" aria-expanded="false">
                        <i class="fa fa-cogs"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" style="max-height: 300px; overflow: auto;">
                                            </ul>
                </div>
            </div>
            <div class="ibox-content" id="normaldashboardcontent">
                Welcome
            </div>
        </div>
        <div class="ibox">
            <div class="ibox-title">
                <h5>Notifications</h5>
            </div>

            <div class="ibox-content">
                <strong>No New Notifications</strong>
            </div>
        </div>

    </div>

    <div class="col-md-5">
        <div class="ibox">
            <div class="ibox-title">
                <h5>News</h5>
            </div>

            <div class="ibox-content">
                <div class="demo1 demof">
                    <ul>
                    <li>
                        <p>The art duo of Gilbert and George on how their work can ruffle feathers and the benefits of routine.</p>
                    </li>

                    <li class="odd">
                        <p>Song Byeok had every reason to be pleased with his success. A gift for drawing led to a prestigious career as a propaganda artist and full membership in North Korea's communist party.</p>
                    </li>

                    <li>
                        <p>CNN's Kyung Lah sits down with Japan's World Cup-winning captain to reflect on their win amid tragedy.</p>
                    </li>

                    </ul>
                    </div>
            </div>
        </div>
    </div>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('.demo1').easyTicker({
                direction: 'up'
            });
        })
    </script> 

@endsection
