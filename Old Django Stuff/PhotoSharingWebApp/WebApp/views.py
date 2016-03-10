from django.shortcuts import render
from django.http import HttpResponse
from WebApp.forms import LoginForm

def hello(request):
        return HttpResponse("Hello world")


def login(request):
    username = "not logged in"

    if request.method = "POST":
        #get the posted form
        MyLoginForm  = LoginForm(request.POST)

        if MyLoginForm.is_valid():
            username = MyLoginForm.cleaned_data['username']
    else:
        MyLoginForm = LoginForm()

    return render(request,'loggedin.html',{"username":username})


