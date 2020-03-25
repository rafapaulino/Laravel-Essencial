<?php 

function btn_edit($route, $label, $id)
{
    return view('partials.edit', array(
        'route' => $route,
        'label' => $label,
        'id' => $id
    ))->render();
}

function btn_delete($route, $label, $id)
{
    return view('partials.delete', array(
        'route' => $route,
        'label' => $label,
        'id' => $id
    ))->render();
}

function btn_show($route, $label, $id, $class = '')
{
    return view('partials.show', array(
        'route' => $route,
        'label' => $label,
        'id' => $id,
        'class' => $class
    ))->render();
}

function form_value($name, $obj)
{
    if ( isset($obj) && is_object($obj) )   
        return old($name, optional($obj)->{$name});
    else
        return old($name);    
}

function notempty($name, $obj)
{
    $class = '';
    $value = form_value($name, $obj);
   
    if (trim($value) !== "")  {
        $class = 'active';
    }
    echo $class;
}

function form_selected($name, $obj, $key)
{
    if ( isset($obj) && is_object($obj) )   
        return ( old($name, optional($obj)->{$name}) == $key ) ? 'selected="selected"' : '';
    else if ( isset($obj) && is_array($obj) && isset($obj[$name]) )
        return ( old($name, $obj[$name]) == $key ) ? 'selected="selected"' : '';
    else
        return ( old($name) == $key ) ? 'selected="selected"' : '';    
}

function form_checked($name, $list, $key)
{
    if ( is_array($list) && count($list) > 0 && in_array($key, $list) )
        return 'checked="checked"';
    else if ( isset($obj) && is_array($obj) && isset($obj[$name]) )
        return ( old($name, $obj[$name]) == $key ) ? 'checked="checked"' : '';
    else if ( old($name) == $key )
        return 'checked="checked"';    
    else
        return '';
}

function show_file($name, $obj)
{
    $file = form_value($name, $obj);
    if( is_embeded($file) ) {
        return 'https://docs.google.com/viewer?url=' . $file . '&amp;embedded=true';
    } else {
        return $file;
    }
}


function is_embeded($file)
{
    $ext = explode(".",$file);
    $ext = $ext[count($ext)-1];

    if(in_array($ext, array('pdf','xls','xlsx','doc','docx','ppsx','pps','ppt','pptx')))
    return true;
    else
    return false;
}

function datatable_status($status)
{
    switch($status)
    {
        case 'published':
        default:
            $status = 'Publicado';
        break;
        case 'draft':
            $status = 'Rascunho';
        break;
        case 'pending review':
            $status = 'Revisão Pendente';
        break;
    }

    return $status;
}