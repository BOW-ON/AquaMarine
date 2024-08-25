<template>
    <div class="container">
        <div class="regist_title">
            <h1>유저 회원 가입</h1>
            <hr>
            <h2>개인정보입력</h2>
        </div>
        <div class="regist_form">
            <div>이름<span>*</span></div>
            <input class="font_size" type="text" autoComplete="off" v-model="inputData.name" @blur="nameBlur(inputData.name)">
            <div :class="textStyle.name">{{ errorText.name }}</div>
        </div>
        <div class="regist_form">
            <div>생년월일<span>*</span></div>
            <input class="font_size" type="date" name="birth" v-model="inputData.birth" @blur="birthBlur(inputData.birth)">
            <div :class="textStyle.birth" >{{ errorText.birth }}</div>
        </div>
        <div class="regist_name_form">
            <div>아이디<span>*</span></div>
            <input class="font_size" type="text" v-model="inputData.account" placeholder="영어 대소문자와 숫자를 사용한 6~20글자로 만들어주세요." autoComplete="off">
            <button type="button" @click="$store.dispatch('accountCheck', inputData.account)">중복확인</button>
        </div>
        <div class="regist_form">
            <div>비밀번호<span>*</span></div>
            <input class="font_size" type="text">
        </div>
        <div class="regist_form">
            <div>비밀번호 확인<span>*</span></div>
            <input class="font_size" type="text">
        </div>
        <div class="regist_adress_form">
            <div class="adress_title">주소<span>*</span></div>
            <input class="adress_input1 font_size" type="text" name="postcode" readonly v-model="inputData.postcode" @click="kakaoPostcode">
            <button type="button" class="adress_btn" @click="kakaoPostcode">주소검색</button>
            <input class="adress_input2 font_size" type="text" name="adress" v-model="inputData.address" readonly @click="kakaoPostcode">
            <input class="adress_input3 font_size" type="text" name="detail_adress" v-model="inputData.detail_adress" placeholder="상세주소를 입력해주세요.">
        </div>
        <div class="regist_phone_form">
            <div>전화번호<span>*</span></div>
            <input class="font_size" type="text">
            <button type="button">본인인증</button>
        </div>
        <div class="regist_form">
            <div>성별<span>*</span></div>
            <div class="regist_gender_form">
                <div>
                    남자<input type="radio" name="gender">
                </div>
                <div>
                    여자<input type="radio" name="gender">
                </div>
            </div>
        </div>
        <div class="btn_box">
            <button class="cancel_btn">취소</button>
            <button class="agree_btn">회원가입</button>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

const errorText = reactive({
    name: '',
    birth: '',
    account: '',
    password: '',
    password_chk: '',
    detail_adress: '',
    tel: '',
    gender: '',
});

const textStyle = reactive({
    name: '',
    birth: '',
    account: '',
    password: '',
    password_chk: '',
    detail_adress: '',
    tel: '',
    gender: '',
});

const inputData = reactive({
    name: '',
    birth: '',
    account: '',
    password: '',
    password_chk: '',
    postcode: '',
    address: '',
    detail_adress: '',
    tel: '',
    gender: '',
});

const errorFlg = reactive({
    name: false,
    birth: false,
    account: false,
    password: false,
    password_chk: false,
    detail_adress: false,
    tel: false,
    gender: false,
});

// 이름 정규표현식 체크
function nameBlur(name) {

    const chkName = /^[가-힣]{1,20}$/u;

    if(chkName.test(name)) {
        errorText.name = '';
        errorFlg.name = true;
    } else {
        errorText.name = '이름의 형식에 맞게 기입해 주세요.';
        textStyle.name = 'error-message';
        errorFlg.name = false;
    }
}

// 생년월일 정규표현식 체크
function birthBlur(birth) {

    const chkBirth = /^\d{4}-\d{2}-\d{2}$/;

    if(chkBirth.test(birth)) {
        // 날짜 확인
        const inputDate = new Date(birth);
        const today = new Date();
        // 오늘 이후 날짜 입력시 체크
        if (inputDate > today) {
            errorText.birth = '생년월일은 오늘 날짜 이전이어야 합니다.';
            textStyle.birth = 'error-message';
            errorFlg.birth = false;
        } else {
            errorText.birth = '';
            errorFlg.birth = true;
        }
    } else {
        errorText.birth = '생년월일을 정확히 입력해주세요.';
        textStyle.birth = 'error-message';
        errorFlg.birth = false;
    }
}

// 아이디 정규표현식 체크
function accountBlur(account) {

    const chkAccount = /^[a-zA-Z0-9]{6,20}$/u;

    if(chkAccount.test(account)) {
        errorText.account = '사용가능한 아이디 입니다.';
        textStyle.account = 'pass-message';
        errorFlg.account = true;
    } else {
        errorText.account = '아이디는 영어 대소문자와 숫자를 사용한 6~20글자로 만들어주세요.';
        textStyle.account = 'error-message';
        errorFlg.account = false;
    }
}

function kakaoPostcode() {
    new daum.Postcode({
        // oncomplete : 주소를 선택했을 때 실행되는 함수
        oncomplete: function(data) {
            var addr = ''; // 주소 변수
            var extraAddr = ''; // 참고항목 변수

            // R: 도로명 주소 (roadAddress)
            // J: 지번 주소 (jibunAddress)
            if (data.userSelectedType === 'R') {
                addr = data.roadAddress;
            } else {
                addr = data.jibunAddress;
            }
            if(data.userSelectedType === 'R'){
                if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                    extraAddr += data.bname;
                }
                if(data.buildingName !== '' && data.apartment === 'Y'){
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                if(extraAddr !== ''){
                    extraAddr = ' (' + extraAddr + ')';
                }
            }
            inputData.postcode = data.zonecode;
            inputData.address = addr;
            
            // 주소 선택 시 팝업 창을 닫음
            window.close();
        }
    }).open();
}
</script>
<style scoped src="../../css/Regist.css">
    
</style>