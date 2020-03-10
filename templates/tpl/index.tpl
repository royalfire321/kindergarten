<{if $op == "contact_form"}>
    <{include file="tpl/contact_form.tpl"}>
  <{elseif  $op == "ok"}> 
    <{include file="tpl/ok.tpl"}>
  <{elseif  $op == "login_form"}> 
    <{include file="tpl/login_form.tpl"}> 
  <{elseif  $op == "reg_form"}> 
    <{include file="tpl/reg_form.tpl"}> 
  <{else}>
    
    <{* body.tpl *}>
    <{include file="tpl/body.tpl"}> 

<{/if}>