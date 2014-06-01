<?php
 $id=$_GET['id'];
  $fio=$_GET['fio'];
  $str="add-audit.php?id=".$id."&fio=".$fio;
?>  
					<form action=<?php echo $str ?> id="client_audit" method="post">
					<h2>Клиентская карточка (поля для заполнения аудитом)</h2>
						<fieldset class="client_message_date">
							<div class="messages_audit">
								<label for="messages_audit">Рабочие примечания (комментарии которые будут вносится аудитором)</label>
								<textarea name="messages_audit" id="" cols="30" rows="10"></textarea>
							</div>
							
							<div class="date audit">
								<label for="datepicker_audit">Дата договора</label>
								<input type="text" id="datepicker_audit" class="date_audit">
								<div id="date_audit"></div>
							</div>
						</fieldset>
						<fieldset class="else">
							<h3>Параметры купивших:</h3>
							<fieldset class="left">
								<div class="plot_number">
									<label for="plot_number">Номер участка</label>
									<input type="text" name="plot_number" id="plot_number" size="20" value="">
								</div>
								<div class="contract_number">
									<label for="contract_number">Номер договора</label>
									<input type="text" name="contract_number" id="contract_number" size="20" value="">
								</div>
								<div class="land_area">
									<label for="land_area">Площадь участка</label>
									<select name="land_area" id="land_area">
										<option value="1">6 соток</option>
										<option value="2">12 соток</option>
										<option value="3">17 соток</option>
									</select>
								</div>
								<div class="parameters_the_deal">
									<label for="parameters_the_deal_1">Параметры сделки</label>
									<select name="parameters_the_deal_1" id="parameters_the_deal_1">
										<option value="1">Купля/Продажа</option>
										<option value="2">Инвест. договор</option>
										<option value="3">Общедолевая стоимость</option>
										<option value="4">ОДС</option>
										<option value="5">договор (газ)</option>
									</select>
									<select name="parameters_the_deal_2" id="parameters_the_deal_2">
										<option value="1">Подводки</option>
										<option value="2">Электричество</option>
										<option value="3">Газ</option>
										<option value="4">Вода</option>
									</select>
									<select name="parameters_the_deal_3" id="parameters_the_deal_3">
										<option value="1">ДНП</option>
										<option value="2">Взнос</option>
										<option value="3">Членство</option>
									</select>
								</div>
							</fieldset>
							<fieldset class="right">
								<div class="utensils">
									<label for="utensils">Принадлежность</label>
									<select name="utensils" id="utensils">
										<option value="1">Мега-инвест</option>
										<option value="2">Альфа-инвест</option>
										<option value="3">Астра-инвест</option>
										<option value="4">ИП</option>
									</select>
								</div>
								<div class="contract_value">
									<label for="contract_value">Стоимость договора</label>
									<input type="text" name="contract_value" id="contract_value" size="20" value="">
								</div>
								<div class="kv">
									<label for="kv">КВ</label>
									<input type="text" name="kv" id="kv" size="20" value="">
								</div>
							</fieldset>
						</fieldset>
						<div class="actions">
							<input type="submit" class="button" value="Сохранить">
						</div>
					</form> 