<style>
    .dash-repeater {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 10px;
    }
    .dash-repeater-row {
        display: flex;
        gap: 8px;
    }
    .dash-repeater-row input {
        flex: 1;
    }
    .dash-repeater-remove {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 8px;
        border: 1px solid #e2e8ef;
        background: #fff;
        color: #c53030;
        font-size: 18px;
        line-height: 1;
        cursor: pointer;
    }
    .dash-repeater-remove:hover {
        background: #fde8e8;
    }
    .dash-curriculum-item {
        border: 1px solid #e2e8ef;
        border-radius: 10px;
        padding: 16px;
        margin-bottom: 12px;
        background: #fafcfd;
    }
    .dash-curriculum-toolbar {
        display: grid;
        grid-template-columns: minmax(220px, 280px) auto;
        gap: 14px 16px;
        align-items: end;
        margin: 12px 0 16px;
    }
    .dash-curriculum-count {
        margin-bottom: 0;
    }
    .dash-curriculum-toolbar-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
    }
    .dash-curriculum-item-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 12px;
    }
    .dash-curriculum-item-title {
        font-size: 13px;
        color: var(--dash-text);
    }
    @media (max-width: 640px) {
        .dash-curriculum-toolbar {
            grid-template-columns: 1fr;
        }
    }
</style>
