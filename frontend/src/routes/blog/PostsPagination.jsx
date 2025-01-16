import { css, Global } from '@emotion/react';
import { Pagination } from 'react-bootstrap';

export default function PostsPagination({
  activePage,
  totalPage,
  onPageChange,
}) {
  const totalShowedPage = 3;

  return (
    <>
      <Global
        styles={css`
          .pagination > li > a {
            background-color: white;
            color: red;
          }

          .pagination > li > a:focus,
          .pagination > li > a:hover,
          .pagination > li > span:focus,
          .pagination > li > span:hover {
            color: red;
            outline: none;
            box-shadow: none;
          }

          .pagination > .active > a,
          .pagination > .active > .page-link {
            color: white;
            background-color: red !important;
            border: solid 1px red !important;
          }

          .pagination > .active > a:hover {
            background-color: red !important;
            border: solid 1px red;
          }
        `}
      />
      <Pagination
        css={css`
          display: flex;
          justify-content: center;
        `}
      >
        <Pagination.Prev
          key={'prev'}
          onClick={() => onPageChange(activePage - 1)}
        />
        {(() => {
          let result = [];

          if (activePage < totalShowedPage) {
            for (let i = 1; i <= totalPage; i++) {
              if (i > totalShowedPage) {
                result.push(<Pagination.Ellipsis key={'ellipsis-end'} />);

                result.push(
                  <Pagination.Item
                    key={totalPage}
                    active={activePage == totalPage}
                    onClick={() => onPageChange(totalPage)}
                  >
                    {totalPage}
                  </Pagination.Item>
                );

                break;
              } else {
                result.push(
                  <Pagination.Item
                    key={i}
                    active={activePage == i}
                    onClick={() => onPageChange(i)}
                  >
                    {i}
                  </Pagination.Item>
                );
              }
            }
          } else {
            result.push(
              <Pagination.Item
                key={1}
                active={activePage == 1}
                onClick={() => onPageChange(1)}
              >
                1
              </Pagination.Item>
            );

            result.push(<Pagination.Ellipsis key={'ellipsis-start'} />);

            for (let i = activePage - 1; i <= totalPage; i++) {
              if (i > activePage + 1) {
                result.push(<Pagination.Ellipsis key={'ellipsis-end'} />);

                result.push(
                  <Pagination.Item
                    key={totalPage}
                    active={activePage == totalPage}
                    onClick={() => onPageChange(totalPage)}
                  >
                    {totalPage}
                  </Pagination.Item>
                );
                break;
              } else {
                result.push(
                  <Pagination.Item
                    key={i}
                    active={activePage == i}
                    onClick={() => onPageChange(i)}
                  >
                    {i}
                  </Pagination.Item>
                );
              }
            }
          }

          return result;
        })()}
        <Pagination.Next
          key={'next'}
          onClick={() => onPageChange(activePage + 1)}
        />
      </Pagination>
    </>
  );
}
