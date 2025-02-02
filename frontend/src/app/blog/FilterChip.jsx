import { css, Global } from '@emotion/react';
import { Badge, Button } from 'react-bootstrap';

export default function FilterChip({ category, active, to, onClick }) {
  return (
    <>
      <Global
        styles={css`
          .filter-chip {
            background-color: rgba(255, 255, 255, 0.2) !important;
            color: red !important;
            border: 1px solid red !important;
          }

          .filter-chip-active {
            background-color: red !important;
            color: white !important;
            border: 1px solid red !important;
          }
        `}
      />
      <Badge
        className={`${active ? 'filter-chip-active' : 'filter-chip'}`}
        as={Button}
        // to={to}
        onClick={onClick}
        css={css`
          padding: 8px 16px;
          font-weight: normal;
          font-size: 18px;
        `}
      >
        {category}
      </Badge>
    </>
  );
}
