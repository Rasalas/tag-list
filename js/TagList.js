class TagList {

    constructor(container) {
        this.id = 0;
        this.container = document.querySelector(container);
        this.addHiddenInputsOnLoad();
        this.initTags();
        return this.container;
    }

    addHiddenInput(context) {
        if (!context.classList.contains('active')) {
            context.classList.add('active');
        }

        let hiddeninput_container = this.container.querySelector('span')
        if (hiddeninput_container === null) {
            hiddeninput_container = this.container.insertAdjacentElement('afterBegin', document.createElement('span'));
        }

        let h_input = document.createElement('input')
        h_input.type = 'hidden';
        let container_name = this.container.getAttribute('name') || 'tags';
        h_input.name = `${container_name}[]`;
        h_input.setAttribute('data-tagid', this.id);
        context.setAttribute('data-tagid', this.id++);
        h_input.value = context.dataset.value || context.innerHTML;
        hiddeninput_container.insertAdjacentElement('beforeEnd', h_input)
    }

    addHiddenInputsOnLoad() {
        this.container.querySelectorAll('div.tag.active').forEach(el => {
            this.addHiddenInput(el, this.container, this.id++);
        });
    }

    removeHiddenInput(context) {
        context.classList.remove('active');
        this.container.querySelector(`span input[data-tagid='${context.dataset.tagid}']`).remove();
    }

    initTags() {
        let tags = this.container.querySelectorAll('div.tag');
        let that = this;
        tags.forEach(el => {
            el.addEventListener('click', function() {
                if (this.classList.contains('active')) {
                    that.removeHiddenInput(this, that.container);
                } else {
                    that.addHiddenInput(this, that.container, that.id++);
                }

            });
        });
    }
}