$(function()
{
   //get the click of button
   $('.modalButton').click(function ()
   {
       $('#modal').modal('show')
       .find('#modalContent')
       .load($(this).attr('value'));
   });
});