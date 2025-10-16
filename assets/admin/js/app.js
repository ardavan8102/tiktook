jQuery(document).ready(function($) {
  let answerable = $('#department-answerable');

  answerable.select2({
    minimumInputLength: 1,
    ajax: {
      url: TT_DATA.ajax_url,
      dataType: 'json',
      type: 'post',
      delay: 250,
      timeout: 20000,
      data: function (params) {
        return {
          action: 'tt_search_users',
          term: params.term || '',
          nonce: TT_DATA.nonce || ''
        };
      },
      processResults: function (data) {
        return { results: data || [] };
      },
      cache: true
    },
  });
});
