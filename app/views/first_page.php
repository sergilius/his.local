                <div class="title">
                    <div class="title-lable"><img src="/img/title-lable.gif" width="11" height="15"></div>
                    <div class="title-name">Откуда едем</div>
                </div>
                <form  action="select1.php" method="post">
                    <div class="box">
                        <div class="box-form">
                            <div class="wrap">
                                <label for="region"  class="form-lable">Район</label>
                                <select name="region" id="region">
                                    <option>Выберете район</option>
                                    <option value="Район А">Район А</option>
                                    <option value="Район Б">Район Б</option>
                                    <option value="Район В">Район В</option>
                                </select>
                            </div>
                            <div class="wrap">
                                <label for="hestate"  class="form-lable">Массив</label>
                                <select name="hestate" id="hestate">
                                    <option value="1">Выберете район</option>
<!--
                                    <option value="2">Массив 1b</option>
                                    <option value="2">Массив 1c</option>
                                    <option value="2">Массив 1d</option>
                                    <option value="2">Массив 1e</option>
-->
                                </select>
                            </div>
                        </div>
                        <div class="box-info">
                            <div class="box-info-arrow"></div>
                            <div class="info">
                                Укажите район и массив, откуда вы будете ехать. Если вы знаете точный адрес, то лучше укажите адрес.
                            </div>
                        </div>
                        <div class="wrap">
                            <div class="box-text">или</div>
                        </div>
                        <div class="box-form">
                            <div class="wrap">
                                <label for="street"  class="form-lable">Улица</label>
                                <input type="text" size="20"  name="street" id="street">

                            </div>
                            <div class="wrap">
                                <label for="house"  class="form-lable">Массив</label>
                                <input type="text" size="20"  name="house" id="house">
                            </div>
                        </div>
                        <div class="box-info">
                            <div class="box-info-arrow"></div>
                            <div class="info">
                                Укажите улицу и номер дома. Начните подбирать название улицы и в списке подсветятся найденные варианты.
                            </div>
                        </div>
                    </div>

                    <div class="title">
                        <div class="title-lable"><img src="/img/title-lable.gif" width="11" height="15"></div>
                        <div class="title-name">Откуда едем</div>
                    </div>

                    <div class="box">
                        <div class="box-form">
                            <div class="wrap">
                                <input type="checkbox" name="conditioner" id="conditioner"><span class="input-info">Машина с кондиционером</span>
                                <br>
                                <input type="checkbox" name="car_body" id="car_body"><span class="input-info">Фургон/Универсал</span>
                                <br>
                                <input type="checkbox" name="animals" id="animals"><span class="input-info">Еду с животными</span>
                            </div>
                            <!--
                                                        <div class="wrap">
                                                            <label for="house"  class="form-lable">Массив</label>
                                                            <input type="checkbox" name="house" id="house">
                                                        </div>
                            -->
                        </div>
                        <div class="box-info">
                            <div class="box-info-arrow"></div>
                            <div class="info">
                                Укажите дополнительную информацию которая поможет быстрее и точнее определиться с исполнителем.
                            </div>
                        </div>                        
                    </div>
                    <div class="form-submit">
                        <input type="submit" value="Искать">
                    </div>
                </form>