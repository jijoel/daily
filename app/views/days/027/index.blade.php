<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    {{ HTML::css('bootstrap2')}}
    {{ HTML::css('home')}}

    <style type="text/css">
    </style>
</head>
<body>

    <div class="container">
        <a href="/" class="home">Home</a>

        <h1><a href="{{$dayLink}}">{{ 'Day ' . $day . ': ' . $dayTitle }}</a></h1>

        <p class="note">This is an example of using Angular for a list with a detail view, based on a jsfiddle at <a href="http://jsfiddle.net/viralpatel/JFYLH/">http://jsfiddle.net/viralpatel/JFYLH/</a>. @include('partials.github')</p>


        <div ng-app="" ng-controller="ContactController">
            <table><tr><td valign="top">
                <table class="table table-striped table-bordered">
                <thead> 
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="contact in contacts">
                    <td>@{{ contact.name }}</td>
                    <td>@{{ contact.email }}</td>
                    <td>@{{ contact.phone }}</td>
                    <td>
                        <a href="#" ng-click="edit(contact.id)">edit</a> | 
                        <a href="#" ng-click="delete(contact.id)">delete</a>
                    </td>
                 </tr>
                </tbody>
                </table>
                    <input type="button" value="New" ng-click="newContact()" class="btn btn-primary"/>
            </td><td>
                <form class="well">
                    <label>Name</label> 
                    <input type="text" name="name" ng-model="newcontact.name"/>
                    <label>Email</label> 
                    <input type="text" name="email" ng-model="newcontact.email"/>
                    <label>Phone</label> 
                    <input type="text" name="phone" ng-model="newcontact.phone"/>
                    <br/>
                    <input type="hidden" ng-model="newcontact.id" />
                    <input type="button" value="Save" ng-click="saveContact()" class="btn btn-primary"/>
                </form>
            </td></tr></table>
        </div>

    </div><!-- '.container' -->

{{ HTML::js('angular')}}
<script>

var uid = 4;

function ContactController($scope) {
    
    $scope.contacts = [
        {id:0, 'name': 'Foo', 'email':'foo@gmail.com', 'phone': '123-2343-44'},
        {id:1, 'name': 'Bar', 'email':'bar@gmail.com', 'phone': '123-2343-44'},
        {id:2, 'name': 'Fizz' },
        {id:3, 'name': 'Buzz' },
    ];

    $scope.newContact = function() {
        $scope.newcontact = {};
    }
    
    $scope.saveContact = function() {
        
        if($scope.newcontact.id == null) {
             $scope.newcontact.id = uid++;
             $scope.contacts.push($scope.newcontact);
        } else {
            
             for(i in $scope.contacts) {
                    if($scope.contacts[i].id == $scope.newcontact.id) {
                        $scope.contacts[i] = $scope.newcontact;
                    }
             }
        }
        $scope.newcontact = {};
    }

    $scope.delete = function(id) {
        for(i in $scope.contacts) {
            if($scope.contacts[i].id == id) {
                $scope.contacts.splice(i,1);
                $scope.newcontact = {};
            }
        }
        
    }
    
    $scope.edit = function(id) {
        for(i in $scope.contacts) {
            if($scope.contacts[i].id == id) {
                $scope.newcontact = angular.copy($scope.contacts[i]);
            }
        }
    }
}
</script>

</body>
</html>
