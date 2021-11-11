<template>
    <header>
        <h1 class="mt-5">BoolBnB</h1>
        <div class="container">
            <div class="row mt-5">
                <div class="col-11">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Dove vuoi andare?"
                    />
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-success">Cerca</button>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "Header",
};
</script>
