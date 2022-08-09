<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Event, EventDetail };
use DB;
use Validator;

class EventController extends Controller
{
    public function index() {
        return view('pages/event/index');
    }

    public function getData() {
        $event = new Event;

        $result = '';
        $id = [];
        $i = 0;
        $count = count($event->get_list(request()->filter_status));
        $rowspan = [];
        $event_id = [];
        $method = [];
        $month_1 = [];
        $month_2 = [];
        $month_3 = [];
        $month_4 = [];
        $month_5 = [];
        $month_6 = [];
        // $event_detail_id = [];

        if($count > 0) {
            foreach($event->get_list(request()->filter_status) as $value) {
                $id[$i] = $value->id;

                if($i > 0 && $i < $count) {
                    if($id[$i] == $id[$i-1]) {
                        $rowspan[$value->id] += 1;
                        $data_month_1 = explode('-', $value->month_1);
                        if(count($data_month_1) > 0) {
                            $event_detail_id = (isset($data_month_1[0]) && $data_month_1[0]? $data_month_1[0]:'');
                            $name = (isset($data_month_1[1]) && $data_month_1[1] ? $data_month_1[1].'<br>' : '');
                            $from_date = (isset($data_month_1[2]) && $data_month_1[2] ? $data_month_1[2].' - ' : '');
                            $to_date = (isset($data_month_1[3]) && $data_month_1[3]? $data_month_1[3]:'');
                            $status = (isset($data_month_1[4]) && $data_month_1[4]? $data_month_1[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_1[$value->id][] = $link;
                        } else
                        $month_1[$value->id][] = null;

                        $data_month_2 = explode('-', $value->month_2);
                        if(count($data_month_2) > 0) {
                            $event_detail_id = (isset($data_month_2[0]) && $data_month_2[0]? $data_month_2[0]:'');
                            $name = (isset($data_month_2[1]) && $data_month_2[1] ? $data_month_2[1].'<br>' : '');
                            $from_date = (isset($data_month_2[2]) && $data_month_2[2] ? $data_month_2[2].' - ' : '');
                            $to_date = (isset($data_month_2[3]) && $data_month_2[3]? $data_month_2[3]:'');
                            $status = (isset($data_month_2[4]) && $data_month_2[4]? $data_month_2[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';

                            } else {
                                $link = null;
                            }
                            $month_2[$value->id][] = $link;
                        } else
                        $month_2[$value->id][] = null;

                        $data_month_3 = explode('-', $value->month_3);
                        if(count($data_month_3) > 0) {
                            $event_detail_id = (isset($data_month_3[0]) && $data_month_3[0]? $data_month_3[0]:'');
                            $name = (isset($data_month_3[1]) && $data_month_3[1] ? $data_month_3[1].'<br>' : '');
                            $from_date = (isset($data_month_3[2]) && $data_month_3[2] ? $data_month_3[2].' - ' : '');
                            $to_date = (isset($data_month_3[3]) && $data_month_3[3]? $data_month_3[3]:'');
                            $status = (isset($data_month_3[4]) && $data_month_3[4]? $data_month_3[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_3[$value->id][] = $link;
                        } else
                        $month_3[$value->id][] = null;

                        $data_month_4 = explode('-', $value->month_4);
                        if(count($data_month_4) > 0) {
                            $event_detail_id = (isset($data_month_4[0]) && $data_month_4[0]? $data_month_4[0]:'');
                            $name = (isset($data_month_4[1]) && $data_month_4[1] ? $data_month_4[1].'<br>' : '');
                            $from_date = (isset($data_month_4[2]) && $data_month_4[2] ? $data_month_4[2].' - ' : '');
                            $to_date = (isset($data_month_4[3]) && $data_month_4[3]? $data_month_4[3]:'');
                            $status = (isset($data_month_4[4]) && $data_month_4[4]? $data_month_4[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_4[$value->id][] = $link;
                        } else
                        $month_4[$value->id][] = null;

                        $data_month_5 = explode('-', $value->month_5);
                        if(count($data_month_5) > 0) {
                            $event_detail_id = (isset($data_month_5[0]) && $data_month_5[0]? $data_month_5[0]:'');
                            $name = (isset($data_month_5[1]) && $data_month_5[1] ? $data_month_5[1].'<br>' : '');
                            $from_date = (isset($data_month_5[2]) && $data_month_5[2] ? $data_month_5[2].' - ' : '');
                            $to_date = (isset($data_month_5[3]) && $data_month_5[3]? $data_month_5[3]:'');
                            $status = (isset($data_month_5[4]) && $data_month_5[4]? $data_month_5[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_5[$value->id][] = $link;
                        } else
                        $month_5[$value->id][] = null;

                        $data_month_6 = explode('-', $value->month_6);
                        if(count($data_month_6) > 0) {
                            $event_detail_id = (isset($data_month_6[0]) && $data_month_6[0]? $data_month_6[0]:'');
                            $name = (isset($data_month_6[1]) && $data_month_6[1] ? $data_month_6[1].'<br>' : '');
                            $from_date = (isset($data_month_6[2]) && $data_month_6[2] ? $data_month_6[2].' - ' : '');
                            $to_date = (isset($data_month_6[3]) && $data_month_6[3]? $data_month_6[3]:'');
                            $status = (isset($data_month_6[4]) && $data_month_6[4]? $data_month_6[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_6[$value->id][] = $link;
                        } else
                        $month_6[$value->id][] = null;
                    } else {
                        $rowspan[$value->id] = 1;
                        $event_id[$value->id] = $value->id;
                        $method[$value->id] = $value->method;

                        $data_month_1 = explode('-', $value->month_1);
                        if(count($data_month_1) > 0) {
                            $event_detail_id = (isset($data_month_1[0]) && $data_month_1[0]? $data_month_1[0]:'');
                            $name = (isset($data_month_1[1]) && $data_month_1[1] ? $data_month_1[1].'<br>' : '');
                            $from_date = (isset($data_month_1[2]) && $data_month_1[2] ? $data_month_1[2].' - ' : '');
                            $to_date = (isset($data_month_1[3]) && $data_month_1[3]? $data_month_1[3]:'');
                            $status = (isset($data_month_1[4]) && $data_month_1[4]? $data_month_1[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_1[$value->id][] = $link;
                        } else
                        $month_1[$value->id][] = null;

                        $data_month_2 = explode('-', $value->month_2);
                        if(count($data_month_2) > 0) {
                            $event_detail_id = (isset($data_month_2[0]) && $data_month_2[0]? $data_month_2[0]:'');
                            $name = (isset($data_month_2[1]) && $data_month_2[1] ? $data_month_2[1].'<br>' : '');
                            $from_date = (isset($data_month_2[2]) && $data_month_2[2] ? $data_month_2[2].' - ' : '');
                            $to_date = (isset($data_month_2[3]) && $data_month_2[3]? $data_month_2[3]:'');
                            $status = (isset($data_month_2[4]) && $data_month_2[4]? $data_month_2[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_2[$value->id][] = $link;
                        } else
                        $month_2[$value->id][] = null;

                        $data_month_3 = explode('-', $value->month_3);
                        if(count($data_month_3) > 0) {
                            $event_detail_id = (isset($data_month_3[0]) && $data_month_3[0]? $data_month_3[0]:'');
                            $name = (isset($data_month_3[1]) && $data_month_3[1] ? $data_month_3[1].'<br>' : '');
                            $from_date = (isset($data_month_3[2]) && $data_month_3[2] ? $data_month_3[2].' - ' : '');
                            $to_date = (isset($data_month_3[3]) && $data_month_3[3]? $data_month_3[3]:'');
                            $status = (isset($data_month_3[4]) && $data_month_3[4]? $data_month_3[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_3[$value->id][] = $link;
                        } else
                        $month_3[$value->id][] = null;

                        $data_month_4 = explode('-', $value->month_4);
                        if(count($data_month_4) > 0) {
                            $event_detail_id = (isset($data_month_4[0]) && $data_month_4[0]? $data_month_4[0]:'');
                            $name = (isset($data_month_4[1]) && $data_month_4[1] ? $data_month_4[1].'<br>' : '');
                            $from_date = (isset($data_month_4[2]) && $data_month_4[2] ? $data_month_4[2].' - ' : '');
                            $to_date = (isset($data_month_4[3]) && $data_month_4[3]? $data_month_4[3]:'');
                            $status = (isset($data_month_4[4]) && $data_month_4[4]? $data_month_4[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_4[$value->id][] = $link;
                        } else
                        $month_4[$value->id][] = null;

                        $data_month_5 = explode('-', $value->month_5);
                        if(count($data_month_5) > 0) {
                            $event_detail_id = (isset($data_month_5[0]) && $data_month_5[0]? $data_month_5[0]:'');
                            $name = (isset($data_month_5[1]) && $data_month_5[1] ? $data_month_5[1].'<br>' : '');
                            $from_date = (isset($data_month_5[2]) && $data_month_5[2] ? $data_month_5[2].' - ' : '');
                            $to_date = (isset($data_month_5[3]) && $data_month_5[3]? $data_month_5[3]:'');
                            $status = (isset($data_month_5[4]) && $data_month_5[4]? $data_month_5[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_5[$value->id][] = $link;
                        } else
                        $month_5[$value->id][] = null;

                        $data_month_6 = explode('-', $value->month_6);
                        if(count($data_month_6) > 0) {
                            $event_detail_id = (isset($data_month_6[0]) && $data_month_6[0]? $data_month_6[0]:'');
                            $name = (isset($data_month_6[1]) && $data_month_6[1] ? $data_month_6[1].'<br>' : '');
                            $from_date = (isset($data_month_6[2]) && $data_month_6[2] ? $data_month_6[2].' - ' : '');
                            $to_date = (isset($data_month_6[3]) && $data_month_6[3]? $data_month_6[3]:'');
                            $status = (isset($data_month_6[4]) && $data_month_6[4]? $data_month_6[4]:'');
                            if($name || $from_date || $to_date) {
                                $link = $name.'<a href="javascript:void(0)" title="Update data"
                                            data-event_id=' . $value->id . '
                                            data-method=' . $value->method . '
                                            data-event_detail_id=' . $event_detail_id . '
                                            data-name="' . rtrim($name,'<br>') . '"
                                            data-from_date="' . rtrim($from_date,' - ') . '"
                                            data-to_date="' . $to_date . '"
                                            data-status="' . $status . '"
                                            onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                            } else {
                                $link = null;
                            }
                            $month_6[$value->id][] = $link;
                        } else
                        $month_6[$value->id][] = null;
                    }
                }
                else {
                    $rowspan[$value->id] = 1;
                    $event_id[$value->id] = $value->id;
                    $method[$value->id] = $value->method;

                    $data_month_1 = explode('-', $value->month_1);
                    if(count($data_month_1) > 0) {
                        $event_detail_id = (isset($data_month_1[0]) && $data_month_1[0]? $data_month_1[0]:'');
                        $name = (isset($data_month_1[1]) && $data_month_1[1] ? $data_month_1[1].'<br>' : '');
                        $from_date = (isset($data_month_1[2]) && $data_month_1[2] ? $data_month_1[2].' - ' : '');
                        $to_date = (isset($data_month_1[3]) && $data_month_1[3]? $data_month_1[3]:'');
                        $status = (isset($data_month_1[4]) && $data_month_1[4]? $data_month_1[4]:'');
                        if($name || $from_date || $to_date) {
                            $link = $name.'<a href="javascript:void(0)" title="Update data"
                                        data-event_id=' . $value->id . '
                                        data-method=' . $value->method . '
                                        data-event_detail_id=' . $event_detail_id . '
                                        data-name="' . rtrim($name,'<br>') . '"
                                        data-from_date="' . rtrim($from_date,' - ') . '"
                                        data-to_date="' . $to_date . '"
                                        data-status="' . $status . '"
                                        onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                        } else {
                            $link = null;
                        }
                        $month_1[$value->id][] = $link;
                    } else
                    $month_1[$value->id][] = null;

                    $data_month_2 = explode('-', $value->month_2);
                    if(count($data_month_2) > 0) {
                        $event_detail_id = (isset($data_month_2[0]) && $data_month_2[0]? $data_month_2[0]:'');
                        $name = (isset($data_month_2[1]) && $data_month_2[1] ? $data_month_2[1].'<br>' : '');
                        $from_date = (isset($data_month_2[2]) && $data_month_2[2] ? $data_month_2[2].' - ' : '');
                        $to_date = (isset($data_month_2[3]) && $data_month_2[3]? $data_month_2[3]:'');
                        $status = (isset($data_month_2[4]) && $data_month_2[4]? $data_month_2[4]:'');
                        if($name || $from_date || $to_date) {
                            $link = $name.'<a href="javascript:void(0)" title="Update data"
                                        data-event_id=' . $value->id . '
                                        data-method=' . $value->method . '
                                        data-event_detail_id=' . $event_detail_id . '
                                        data-name="' . rtrim($name,'<br>') . '"
                                        data-from_date="' . rtrim($from_date,' - ') . '"
                                        data-to_date="' . $to_date . '"
                                        data-status="' . $status . '"
                                        onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                        } else {
                            $link = null;
                        }
                        $month_2[$value->id][] = $link;
                    } else
                    $month_2[$value->id][] = null;

                    $data_month_3 = explode('-', $value->month_3);
                    if(count($data_month_3) > 0) {
                        $event_detail_id = (isset($data_month_3[0]) && $data_month_3[0]? $data_month_3[0]:'');
                        $name = (isset($data_month_3[1]) && $data_month_3[1] ? $data_month_3[1].'<br>' : '');
                        $from_date = (isset($data_month_3[2]) && $data_month_3[2] ? $data_month_3[2].' - ' : '');
                        $to_date = (isset($data_month_3[3]) && $data_month_3[3]? $data_month_3[3]:'');
                        $status = (isset($data_month_3[4]) && $data_month_3[4]? $data_month_3[4]:'');
                        if($name || $from_date || $to_date) {
                            $link = $name.'<a href="javascript:void(0)" title="Update data"
                                        data-event_id=' . $value->id . '
                                        data-method=' . $value->method . '
                                        data-event_detail_id=' . $event_detail_id . '
                                        data-name="' . rtrim($name,'<br>') . '"
                                        data-from_date="' . rtrim($from_date,' - ') . '"
                                        data-to_date="' . $to_date . '"
                                        data-status="' . $status . '"
                                        onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                        } else {
                            $link = null;
                        }
                        $month_3[$value->id][] = $link;
                    } else
                    $month_3[$value->id][] = null;

                    $data_month_4 = explode('-', $value->month_4);
                    if(count($data_month_4) > 0) {
                        $event_detail_id = (isset($data_month_4[0]) && $data_month_4[0]? $data_month_4[0]:'');
                        $name = (isset($data_month_4[1]) && $data_month_4[1] ? $data_month_4[1].'<br>' : '');
                        $from_date = (isset($data_month_4[2]) && $data_month_4[2] ? $data_month_4[2].' - ' : '');
                        $to_date = (isset($data_month_4[3]) && $data_month_4[3]? $data_month_4[3]:'');
                        $status = (isset($data_month_4[4]) && $data_month_4[4]? $data_month_4[4]:'');
                        if($name || $from_date || $to_date) {
                            $link = $name.'<a href="javascript:void(0)" title="Update data"
                                        data-event_id=' . $value->id . '
                                        data-method=' . $value->method . '
                                        data-event_detail_id=' . $event_detail_id . '
                                        data-name="' . rtrim($name,'<br>') . '"
                                        data-from_date="' . rtrim($from_date,' - ') . '"
                                        data-to_date="' . $to_date . '"
                                        data-status="' . $status . '"
                                        onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                        } else {
                            $link = null;
                        }
                        $month_4[$value->id][] = $link;
                    } else
                    $month_4[$value->id][] = null;

                    $data_month_5 = explode('-', $value->month_5);
                    if(count($data_month_5) > 0) {
                        $event_detail_id = (isset($data_month_5[0]) && $data_month_5[0]? $data_month_5[0]:'');
                        $name = (isset($data_month_5[1]) && $data_month_5[1] ? $data_month_5[1].'<br>' : '');
                        $from_date = (isset($data_month_5[2]) && $data_month_5[2] ? $data_month_5[2].' - ' : '');
                        $to_date = (isset($data_month_5[3]) && $data_month_5[3]? $data_month_5[3]:'');
                        $status = (isset($data_month_5[4]) && $data_month_5[4]? $data_month_5[4]:'');
                        if($name || $from_date || $to_date) {
                            $link = $name.'<a href="javascript:void(0)" title="Update data"
                                        data-event_id=' . $value->id . '
                                        data-method=' . $value->method . '
                                        data-event_detail_id=' . $event_detail_id . '
                                        data-name="' . rtrim($name,'<br>') . '"
                                        data-from_date="' . rtrim($from_date,' - ') . '"
                                        data-to_date="' . $to_date . '"
                                        data-status="' . $status . '"
                                        onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                        } else {
                            $link = null;
                        }
                        $month_5[$value->id][] = $link;
                    } else
                    $month_5[$value->id][] = null;

                    $data_month_6 = explode('-', $value->month_6);
                    if(count($data_month_6) > 0) {
                        $event_detail_id = (isset($data_month_6[0]) && $data_month_6[0]? $data_month_6[0]:'');
                        $name = (isset($data_month_6[1]) && $data_month_6[1] ? $data_month_6[1].'<br>' : '');
                        $from_date = (isset($data_month_6[2]) && $data_month_6[2] ? $data_month_6[2].' - ' : '');
                        $to_date = (isset($data_month_6[3]) && $data_month_6[3]? $data_month_6[3]:'');
                        $status = (isset($data_month_6[4]) && $data_month_6[4]? $data_month_6[4]:'');
                        if($name || $from_date || $to_date) {
                            $link = $name.'<a href="javascript:void(0)" title="Update data"
                                        data-event_id=' . $value->id . '
                                        data-method=' . $value->method . '
                                        data-event_detail_id=' . $event_detail_id . '
                                        data-name="' . rtrim($name,'<br>') . '"
                                        data-from_date="' . rtrim($from_date,' - ') . '"
                                        data-to_date="' . $to_date . '"
                                        data-status="' . $status . '"
                                        onclick="edit(this)" data-toggle="modal" data-target="#InputModal">'.$from_date.$to_date.'</a>';
                        } else {
                            $link = null;
                        }
                        $month_6[$value->id][] = $link;
                    } else
                    $month_6[$value->id][] = null;
                }
                $i++;
            }
            // dd($rowspan,$event_id, $method, $month_1, $month_2, $month_3, $month_4, $month_5, $month_6);
            foreach($event_id as $value) {
                $result .= '<tr>';
                $result .= '<td style="vertical-align: middle;">' . $method[$value] . '</td>';

                if(array_filter($month_1[$value])) {
                    $result .= '<td>';
                            $result .='<ul>';
                            foreach($month_1[$value] as $m1) {
                                if($m1) {
                                    $result .= '<li>';
                                    $result .= $m1 . '<br>';
                                    $result .= '</li>';
                                }
                            }
                            $result .='<ul>';
                    $result .= '</td>';
                } else {
                    $result .= '<td class="text-center" style="vertical-align: middle;"><a href="javascript:void(0)" data-toggle="modal" data-target="#InputModal" title="tambah event" onclick="resetForm();tambahEvent('.$event_id[$value].',\''.$method[$value].'\')" class="btn btn-sm btn-success">+</a></td>';
                }

                if(array_filter($month_2[$value])) {
                    $result .= '<td>';
                            $result .='<ul>';
                            foreach($month_2[$value] as $m2) {
                                if($m2) {
                                    $result .= '<li>';
                                    $result .= $m2 . '<br>';
                                    $result .= '</li>';
                                }
                            }
                            $result .='<ul>';
                    $result .= '</td>';
                } else {
                    $result .= '<td class="text-center" style="vertical-align: middle;"><a href="javascript:void(0)" data-toggle="modal" data-target="#InputModal" title="tambah event" onclick="resetForm();tambahEvent('.$event_id[$value].',\''.$method[$value].'\')" class="btn btn-sm btn-success">+</a></td>';
                }

                if(array_filter($month_3[$value])) {
                    $result .= '<td>';
                            $result .='<ul>';
                            foreach($month_3[$value] as $m3) {
                                if($m3) {
                                    $result .= '<li>';
                                    $result .= $m3 . '<br>';
                                    $result .= '</li>';
                                }
                            }
                            $result .='<ul>';
                    $result .= '</td>';
                } else {
                    $result .= '<td class="text-center" style="vertical-align: middle;"><a href="javascript:void(0)" data-toggle="modal" data-target="#InputModal" title="tambah event" onclick="resetForm();tambahEvent('.$event_id[$value].',\''.$method[$value].'\')" class="btn btn-sm btn-success">+</a></td>';
                }

                if(array_filter($month_4[$value])) {
                    $result .= '<td>';
                            $result .='<ul>';
                            foreach($month_4[$value] as $m4) {
                                if($m4) {
                                    $result .= '<li>';
                                    $result .= $m4 . '<br>';
                                    $result .= '</li>';
                                }
                            }
                            $result .='<ul>';
                    $result .= '</td>';
                } else {
                    $result .= '<td class="text-center" style="vertical-align: middle;"><a href="javascript:void(0)" data-toggle="modal" data-target="#InputModal" title="tambah event" onclick="resetForm();tambahEvent('.$event_id[$value].',\''.$method[$value].'\')" class="btn btn-sm btn-success">+</a></td>';
                }

                if(array_filter($month_5[$value])) {
                    $result .= '<td>';
                            $result .='<ul>';
                            foreach($month_5[$value] as $m5) {
                                if($m5) {
                                    $result .= '<li>';
                                    $result .= $m5 . '<br>';
                                    $result .= '</li>';
                                }
                            }
                            $result .='<ul>';
                    $result .= '</td>';
                } else {
                    $result .= '<td class="text-center" style="vertical-align: middle;"><a href="javascript:void(0)" data-toggle="modal" data-target="#InputModal" title="tambah event" onclick="resetForm();tambahEvent('.$event_id[$value].',\''.$method[$value].'\')" class="btn btn-sm btn-success">+</a></td>';
                }

                if(array_filter($month_6[$value])) {
                    $result .= '<td>';
                            $result .='<ul>';
                            foreach($month_6[$value] as $m6) {
                                if($m6) {
                                    $result .= '<li>';
                                    $result .= $m6 . '<br>';
                                    $result .= '</li>';
                                }
                            }
                            $result .='<ul>';
                    $result .='</td>';
                } else {
                    $result .= '<td class="text-center" style="vertical-align: middle;"><a href="javascript:void(0)" data-toggle="modal" data-target="#InputModal" title="tambah event" onclick="resetForm();tambahEvent('.$event_id[$value].',\''.$method[$value].'\')" class="btn btn-sm btn-success">+</a></td>';
                }

                $result .= '<td class="text-center">
                                <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteEvent('.$event_id[$value].')" title="Hapus data">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a></td>';
                $result .= '</tr>';
            }
        }

        echo $result;
    }

    public function store(Request $req){
        DB::BeginTransaction();

        try {
            $validated = Validator::make($req->all(), [
                'method' => 'required|max:255',
                'name' => 'required|max:255',
                'from_date' => 'required|date_format:"d/m/Y"',
            ]);

            if ($validated->fails()) {
                $message = array();
                $message['message'] = $validated->errors();

                return response()->json($message)->setStatusCode(400);
                // return $this->failsValidate($validator->errors());
            }

            if(date('Y-m-d', strtotime(str_replace('/', '-', $req->to_date))) < date('Y-m-d', strtotime(str_replace('/', '-', $req->from_date)))) {
                $message = array();
                $message['message'] = 'Tanggal tujuan tidak boleh lebih kecil dari tanggal asal';

                return response()->json($message)->setStatusCode(400);
            }

            $data = Event::create([
                    'method' => $req->method,
                    'user_id' => auth()->user()->id,
                ]);

            if ($data) {
                EventDetail::create([
                    'name' => $req->name,
                    'event_id' => $data->id,
                    'from_date' => date('Y-m-d', strtotime(str_replace('/', '-', $req->from_date))),
                    'to_date' => date('Y-m-d', strtotime(str_replace('/', '-', $req->to_date))),
                    'status' => $req->status,
                    'month' => date('m', strtotime(str_replace('/', '-', $req->from_date))),
                ]);
            }

			$message = array();
            $message['message'] = 'Data saved successfully';

            DB::commit();
            return response()->json($message)->setStatusCode(200);
        } catch(\Throwable $e) {
            DB::rollback();
            $message = array();
            $message['message'] = $e->getMessage();
            return response()->json($message)->setStatusCode(400);
        }
	}


    public function update($id, Request $req){
        DB::BeginTransaction();

        try{
            $event = Event::find($id);
            if(!$event) {
                $message = array();
                $message['message'] = 'Data not found';

                return response()->json($message)->setStatusCode(400);
            }

            $validated = Validator::make($req->all(), [
                'method' => 'required|max:255',
                'name' => 'required|max:255',
                'from_date' => 'required|date_format:"d/m/Y"',
            ]);

            if ($validated->fails()) {
                $message = array();
                $message['message'] = $validated->errors();

                return response()->json($message)->setStatusCode(400);
                // return $this->failsValidate($validator->errors());
            }

            if(date('Y-m-d', strtotime(str_replace('/', '-', $req->to_date))) < date('Y-m-d', strtotime(str_replace('/', '-', $req->from_date)))) {
                $message = array();
                $message['message'] = 'Tanggal tujuan tidak boleh lebih kecil dari tanggal asal';

                return response()->json($message)->setStatusCode(400);
            }

            $data = $event->update([
                    'method' => $req->method
                ]);

            if ($data) {
                $get_month = (int)date('m', strtotime(str_replace('/', '-', $req->from_date)));
                if($req->event_detail_id) {
                    $event_detail = EventDetail::find($req->event_detail_id);
                    if(!$event_detail) {
                        $message = array();
                        $message['message'] = 'Data not found';

                        return response()->json($message)->setStatusCode(400);
                    }

                    $event_detail->update([
                        'name' => $req->name,
                        'from_date' => date('Y-m-d', strtotime(str_replace('/', '-', $req->from_date))),
                        'to_date' => date('Y-m-d', strtotime(str_replace('/', '-', $req->to_date))),
                        'status' => $req->status,
                        'month' => date('m', strtotime(str_replace('/', '-', $req->from_date))),
                    ]);
                } else {
                    $event_detail = EventDetail::where('month', $get_month)->where('event_id', $id)->first();

                    if($event_detail) {
                        $event_detail->update([
                            'name' => $req->name,
                            'from_date' => date('Y-m-d', strtotime(str_replace('/', '-', $req->from_date))),
                            'to_date' => date('Y-m-d', strtotime(str_replace('/', '-', $req->to_date))),
                            'status' => $req->status,
                            'month' => date('m', strtotime(str_replace('/', '-', $req->from_date))),
                        ]);
                    } else {
                        EventDetail::create([
                            'name' => $req->name,
                            'event_id' => $id,
                            'from_date' => date('Y-m-d', strtotime(str_replace('/', '-', $req->from_date))),
                            'to_date' => date('Y-m-d', strtotime(str_replace('/', '-', $req->to_date))),
                            'status' => $req->status,
                            'month' => date('m', strtotime(str_replace('/', '-', $req->from_date))),
                        ]);
                    }
                }
            }

            $message = array();
            $message['message'] = 'Data updated successfully';

            DB::commit();
            return response()->json($message)->setStatusCode(200);
        } catch(\Throwable $e) {
            DB::rollback();
            $message = array();
            $message['message'] = $e->getMessage();
            return response()->json($message)->setStatusCode(400);
        }
	}

	public function destroy($id){
        DB::BeginTransaction();

        try {
            $event = Event::where('id', $id)->first();

            if(!$event) {
                $message = array();
                $message['message'] = 'Data not found';

                return response()->json($message)->setStatusCode(400);
            }

            if($event->delete()) {
                EventDetail::where('event_id', $id)->delete();
            }

            $message = array();
            $message['message'] = 'Data deleted successfully';

            DB::commit();
            return response()->json($message)->setStatusCode(200);
		}catch(\Throwable $e) {
            DB::rollback();
            $message = array();
            $message['message'] = $e->getMessage();
            return response()->json($message)->setStatusCode(400);
        }
	}
}
