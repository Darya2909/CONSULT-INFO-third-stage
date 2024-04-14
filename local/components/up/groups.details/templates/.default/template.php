<?php
/**
 * @var array $arResult
 * @var array $arParams
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<style>
	table {
		width: 100%;
		border-collapse: collapse;
	}

	th, td {
		border: 1px solid #000;
		padding: 8px;
		text-align: left;
	}

	th {
		background-color: #f2f2f2;
	}

	/* Стили для четных строк */
	tr:nth-child(even) {
		background-color: #f2f2f2;
	}
</style>

<table>
	<tr>
		<th>ID</th>
		<th>Название группы</th>
		<th>Описание группы</th>
	</tr>
		<tr>
			<td><?= $arResult['ELEMENT']['ID'] ?></td>
			<td><?= $arResult['ELEMENT']['NAME'] ?></td>
			<td><?= $arResult['ELEMENT']['DESCRIPTION'] ?></td>
		</tr>
</table>
