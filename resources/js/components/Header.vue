<template>
    <header>
        <h1 class="mt-5">BoolBnB</h1>
        <div class="container">
            <div class="row mt-5">
                <div class="col-9">
                    <input
                        type="text"
                        class="form-control search-bar"
                        placeholder="Dove vuoi andare?"
                    />
                </div>
                <div
                    class="
                        col-2
                        d-flex
                        align-items-center
                        justify-content-center
                    "
                >
                    <a href="" class="adv-src"> Ricerca avanzata </a>
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
