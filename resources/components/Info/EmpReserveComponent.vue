<template>
    <main>
        <div class="empMypage_grid">
            <h1 class="empMypage_title">
                예약 관리 (이미지)
            </h1>
            <div class="empMypage_nav empMypage_nav_grid">
                <h2>마이페이지</h2>
                <router-link to="/empUpdate">기본 정보 변경</router-link>
                <router-link to="/empPool">수영장 관리</router-link>
                <router-link to="/empTeacher">강사 관리</router-link>
                <router-link to="/empCloseDay">휴무일 관리</router-link>
                <router-link to="/empReserve">예약 관리</router-link>
                <router-link to="/empReview">리뷰 관리</router-link>
            </div>
            <div class="empMypage_main">
                예약 관리 페이지 내용
            </div>
        </div>
    </main>
</template>
<script setup>

</script>
<style scoped src="../../css/infoEmp.css">

</style>