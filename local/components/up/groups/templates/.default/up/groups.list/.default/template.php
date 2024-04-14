<?php
/**
* @var array $arResult
 * @var array $arParams
 */
 if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$APPLICATION->SetTitle($arParams["PAGE_TITLE"]); ?>


<table>
	<tr>
		<th>ID</th>
		<th>Название группы</th>
		<th>Описание группы</th>
		<th>Ссылка</th>
	</tr>
    <?php foreach ($arResult['GROUPS'] as $group): ?>
		<tr>
			<td><?= $group['ID'] ?></td>
			<td><?= $group['NAME'] ?></td>
			<td><?= $group['DESCRIPTION'] ?></td>
			<td><a href="/groups/<?= $group['ID'] ?>/"><?= $group['ID'] ?></a></td>
		</tr>
    <?php endforeach; ?>
</table>
