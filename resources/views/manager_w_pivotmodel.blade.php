<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Manager working on projects</h3>
	Relation: project has users and user calling the pivot model and pivor model calling the manager relation and this relation calling the name.
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
						@foreach($project->myusers as $user)
						<li>
							{{$user->name}} ----[{{$user->pivot->created_at}}]----[{{$user->pivot->manager->name}}]
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