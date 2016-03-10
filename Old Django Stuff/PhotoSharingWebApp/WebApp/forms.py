from django import forms

class LoginForms(forms.Form):
    user = forms.CharField(max_length=100)
    password = forms.CharField(widget=forms.passoword)


