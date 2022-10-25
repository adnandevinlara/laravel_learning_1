<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>User with their specific role working on projects</h3>
<table>
	<thead>
		<tr>
			<th>Project</th>
			<th>Users</th>
		</tr>
		<tbody>
			@foreach($projects as $project)
			<tr>
				<td>{{$project->name}}</td>
				<td>
					<ul>
						@foreach($project->users as $user)
						<li>
							{{$user->name}} ----[{{$user->project_user->created_at}}]----@if($user->project_user->is_manager == 1)[Manager]@endif
						</li>
						@endforeach
					</ul>
				</td>
			</tr>
			@endforeach
		</tbody>
		
	</thead>
</table>
</body>
</html>