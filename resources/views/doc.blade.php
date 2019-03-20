@extends('layout')

@section('title', 'Editable Doc')

@section('main')
	<div contenteditable="true" class="edit">
  		This text can be edited by the user.
	</div>
	<script>
		let connection = new WebSocket('wss://nodeforlaravel.herokuapp.com');

		connection.onopen = () => {
			console.log('Connected from the frontend');

			// connection.send('hello');
		};

		connection.onerror = () => {
			console.log('Faied to connect from the frontend');
		};

		connection.onmessage = (event) => {
			console.log('Received message', event.data);
			//let li = document.createElement('li');
			//li.innerText = event.data;
			document.querySelector('.edit').innerHTML = event.data;
		};
		//let temp = document.querySelectorAll("[contenteditable=true]");
		//console.log()
		document.querySelector('.edit').addEventListener('input', (event) =>{
			event.preventDefault();

			let message = document.querySelector(".edit").innerHTML;
			connection.send(message);
			document.querySelector('.edit').value = message;
		});
	</script>
@endsection