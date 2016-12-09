$(document)
.ready(function() {

var
changeSides = function() {
$('.ui.shape')
.eq(0)
.shape('flip over')
.end()
.eq(1)
.shape('flip over')
.end()
.eq(2)
.shape('flip back')
.end()
.eq(3)
.shape('flip back')
.end()
;
},
validationRules = {
firstName: {
identifier  : 'email',
rules: [
{
  type   : 'empty',
  prompt : 'Please enter an e-mail'
},
{
  type   : 'email',
  prompt : 'Please enter a valid e-mail'
}
]
}
}
;

$('.ui.dropdown')
.dropdown({
on: 'hover'
})
;

$('.ui.form')
.form(validationRules, {
on: 'blur'
})
;
$('.ui.checkbox')
.checkbox()
;

$('.ui.radio.checkbox')
.checkbox()
;

$('.small.apply.modal')
.modal('attach events', '.small.apply.button', 'show');

$('.meeting.modal')
.modal('attach events', '.meeting.button', 'show');

$('.masthead .information')
.transition('scale in')
;
$('.tt.modal')
.modal('attach events', '.tt.button', 'show');
$('.aedu.modal')
.modal('attach events', '.aedu.button', 'show');
$('.alan.modal')
.modal('attach events', '.alan.button', 'show');
$('.aschool.modal')
.modal('attach events', '.aschool.button', 'show');
$('.aintern.modal')
.modal('attach events', '.aintern.button', 'show');
$('.aproj.modal')
.modal('attach events', '.aproj.button', 'show');
$('.awar.modal')
.modal('attach events', '.awar.button', 'show');
$('.others.modal')
.modal('attach events', '.others.button', 'show');

setInterval(changeSides, 3000);

})
;